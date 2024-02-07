<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TwigTemplateEmailSender
{
    private $mailer;
    private $httpClient;

    public function __construct(MailerInterface $mailer, HttpClientInterface $httpClient)
    {
        $this->mailer = $mailer;
        $this->httpClient = $httpClient;
    }

    public function sendTemplatedEmail(Address|string $recipientEmail, string $subject, string $template, array $context = [], $attachmentPath = null)
    {
        $email = (new TemplatedEmail())
            ->from(Address::create('NCLH Admin <do_not_reply@janivanorpilla.com>'))
            ->to($recipientEmail)
            ->subject($subject)
            ->htmlTemplate($template)
            ->context($context);

        if ($attachmentPath) {

            // Fetch the PDF content from the route
            $response = $this->httpClient->request('GET', $attachmentPath, [
                'verify_peer' => false,
//                'verify_peer_name' => false,
            ]);
            $pdfContent = $response->getContent();
            // Attach the PDF content to the email
            $pdfPart = new DataPart($pdfContent, 'Crew.pdf', 'application/pdf');
            $email->addPart($pdfPart);
        }


        $this->mailer->send($email);
    }
}