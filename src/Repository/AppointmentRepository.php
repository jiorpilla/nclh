<?php

namespace App\Repository;

use App\Entity\Appointment;
use App\Utils\Traits\CommonRepositoryTrait;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appointment>
 *
 * @method Appointment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appointment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appointment[]    findAll()
 * @method Appointment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointmentRepository extends ServiceEntityRepository
{
    use CommonRepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appointment::class);
    }

    public function getListQuery()
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.deleted = :deleted')
            ->setParameter('deleted', 0)
            ->getQuery();
    }

    public function getAppointments()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM appointment 
            INNER JOIN appointee ON appointee.id = appointment.appointee_id AND appointee.deleted = 0
            INNER JOIN crew ON crew.email = appointee.email AND crew.deleted = 0
            INNER JOIN medical_history ON crew.id = medical_history.crew_id AND medical_history.deleted = 0
            ORDER BY appointment_date
            ';
        $query = $this->getEntityManager()->createQuery($sql);
        return $query;
    }

    /**
     * return Query only since im gonna be using a pagination style in the controller
     * @param string $dateFilter
     * @param \DateTimeInterface|null $startDate
     * @param \DateTimeInterface|null $endDate
     * @return \Doctrine\ORM\Query
     */
    public function findAppointmentsByDateFilter(string $dateFilter, ?\DateTimeInterface $startDate = null, ?\DateTimeInterface $endDate = null)
    {
        $queryBuilder = $this->createQueryBuilder('a');

        $queryBuilder->andWhere('a.deleted = 0');

        //this is only run when the dateFilter is available
        switch ($dateFilter) {
            case 'today':
                $queryBuilder->andWhere('a.appointmentDate >= :todayStart AND a.appointmentDate < :todayEnd')
                    ->setParameter('todayStart', new \DateTime('today'))
                    ->setParameter('todayEnd', new \DateTime('tomorrow'));
                break;

            case 'tomorrow':
                $queryBuilder->andWhere('a.appointmentDate >= :tomorrowStart AND a.appointmentDate < :tomorrowEnd')
                    ->setParameter('tomorrowStart', new \DateTime('tomorrow'))
                    ->setParameter('tomorrowEnd', new \DateTime('tomorrow + 1 day'));
                break;

            case 'next-week':
                // Calculate the start of next week by adding 6 or 7 days from today
                $nextWeekStart = new \DateTime('today +6 days'); // or 'today +7 days'

                // Calculate the end of next week by adding 6 or 7 days from the start date
                $nextWeekEnd = clone $nextWeekStart;
                $nextWeekEnd->modify('+6 days'); // or '+7 days'

                $queryBuilder->andWhere('a.appointmentDate >= :nextWeekStart AND a.appointmentDate < :nextWeekEnd')
                    ->setParameter('nextWeekStart', $nextWeekStart)
                    ->setParameter('nextWeekEnd', $nextWeekEnd);
                break;

            case 'overdue':
                $queryBuilder->andWhere('a.appointmentDate < :todayStart')
                    ->setParameter('todayStart', new \DateTime('today'));
                break;

            default:
                // Handle unknown date filter
                break;
        }

        return $queryBuilder->getQuery();
    }
    /**
     * return Query only since im gonna be using a pagination style in the controller
     * @param string $dateFilter
     * @param \DateTimeInterface|null $startDate
     * @param \DateTimeInterface|null $endDate
     * @return \Doctrine\ORM\Query
     */
    public function findAppointments(?\DateTimeInterface $startDate = null, ?\DateTimeInterface $endDate = null, string $search = null, ?array $status = null)
    {
        $queryBuilder = $this->createQueryBuilder('a')
            ->leftJoin('a.crew', 'c');

        $queryBuilder->andWhere('a.deleted = 0');

        if ($search) {
            $queryBuilder->andWhere('(c.first_name LIKE :search OR c.last_name LIKE :search OR c.email LIKE :search)')
                ->setParameter('search', '%' . $search . '%');
        }

        if ($startDate && $endDate) {
            $queryBuilder->andWhere('(a.appointmentDate >= :startDate AND a.appointmentDate <= :endDate)')
                ->setParameter('startDate', $startDate)
                ->setParameter('endDate', $endDate);
        }elseif($startDate && empty($endDate)){
            $queryBuilder->andWhere('a.appointmentDate >= :startDate')
                ->setParameter('startDate', $startDate);
        }elseif(empty($startDate) && $endDate){
            $queryBuilder->andWhere('a.appointmentDate <= :endDate')
                ->setParameter('endDate', $endDate);
        }

        if ($status) {
            $queryBuilder->andWhere('a.status IN (:status)')->setParameter('status', $status);
        }else{
            $queryBuilder->andWhere('a.status != :status')->setParameter('status', 'checked_in');
        }

        $queryBuilder->orderBy('a.appointmentDate', 'ASC')
            ->addOrderBy('c.last_name', 'ASC')
            ->addOrderBy('c.first_name', 'ASC');

        return $queryBuilder->getQuery();
    }
}
