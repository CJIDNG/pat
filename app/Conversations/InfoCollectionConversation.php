<?php

namespace App\Conversations;

use App\Report;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class InfoCollectionConversation extends Conversation 
{
    /**
     * First question
     */
    public function askName() {
        $question = Question::create("What is the name of the victim?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_name');

        return $this->ask($question, function (Answer $answer) {
            $this->bot->userStorage()->save([
                'victim' => $answer->getValue(),
            ]);
            $this->bot->typesAndWaits(1);
            $this->askAffiliation();
        });
    }

    public function askAffiliation() {
        $question = Question::create("State the victim's affiliation.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_contact');

        return $this->ask($question, function (Answer $answer) {
            $this->bot->userStorage()->save([
                'affiliation' => $answer->getValue(),
            ]);
            $this->bot->typesAndWaits(1);
            $this->askAssailant();
        });
    }

    public function askAssailant() {
        $question = Question::create("State the assailant.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_legal_assistance');

        return $this->ask($question, function (Answer $answer) {
            $this->bot->userStorage()->save([
                'assailant' => $answer->getValue(),
            ]);
            $this->bot->typesAndWaits(1);
            $this->askTypeOfAttack();
        });
    }

    public function askTypeOfAttack() {
        $question = Question::create("What is the type of attack?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_type_of_attacke')
            ->addButtons([
                Button::create('Physical Assault/Torture')->value('1'),
                Button::create('Arrest/Detention')->value('2'),
                Button::create('Border Stop')->value('3'),
                Button::create('Seizure/Destruction of tools')->value('4'),
                Button::create('Equipment or Property Damage')->value('5'),
                Button::create('Denial of Access')->value('6'),
                Button::create('Threat')->value('7'),
                Button::create('Harassment')->value('8')
            ]);

        return $this->ask($question, function(Answer $answer) {
            if($answer->isInteractiveMessageReply()) {
                $this->bot->userStorage()->save([
                    'report_type_id' => $answer->getValue(),
                ]);
                $this->bot->typesAndWaits(1);
                $this->askLocationOfAttack();
            }
        });
    }

    public function askLocationOfAttack() {
        $question = Question::create("What is the location of the attack?")
            ->fallback('Unable to ask question')
            ->callbackId('ask_location_of_attack')
            ->addButtons([
                Button::create('Abia')->value('1'),
                Button::create('Adamawa')->value('2'),
                Button::create('Akwa Ibom')->value('3'),
                Button::create('Anambra')->value('4'),
                Button::create('Bauchi')->value('5'),
                Button::create('Benue')->value('6'),
                Button::create('Borno')->value('7'),
                Button::create('Cross River')->value('8'),
                Button::create('Delta')->value('9'),
                Button::create('Edo')->value('10'),
                Button::create('Ebonyi')->value('11'),
                Button::create('Ekiti')->value('12'),
                Button::create('Enugu')->value('13'),
                Button::create('FCT Abuja')->value('14'),
                Button::create('Gombe')->value('15'),
                Button::create('Imo')->value('16'),
                Button::create('Jigawa')->value('17'),
                Button::create('Kaduna')->value('18'),
                Button::create('Kano')->value('19'),
                Button::create('Katsina')->value('20'),
                Button::create('Kebbi')->value('21'),
                Button::create('Kogi')->value('22'),
                Button::create('Kwara')->value('23'),
                Button::create('Lagos')->value('24'),
                Button::create('Nasaraw')->value('25'),
                Button::create('Niger')->value('26'),
                Button::create('Ogun')->value('27'),
                Button::create('Ondo')->value('28'),
                Button::create('Osun')->value('29'),
                Button::create('Oyo')->value('30'),
                Button::create('Plateu')->value('31'),
                Button::create('Rivers')->value('32'),
                Button::create('Sokoto')->value('33'),
                Button::create('Taraba')->value('34'),
                Button::create('Yobe')->value('35'),
                Button::create('Zamfara')->value('36'),
                Button::create('Bayelsa')->value('37')
            ]);

        return $this->ask($question, function (Answer $answer) {
            if($answer->isInteractiveMessageReply()) {
                $this->bot->userStorage()->save([
                    'state_id' => $answer->getValue(),
                ]);
                $this->bot->typesAndWaits(1);
                $this->askDescription();
            }
        });
    }

    public function askDescription() {
        $question = Question::create("Provide the description of the attack in 150 words. Please include your contact information and whether legal assistance is needed")
            ->fallback('Unable to ask question')
            ->callbackId('ask_description');

        return $this->ask($question, function (Answer $answer) {
            $this->bot->userStorage()->save([
                'description' => $answer->getValue(),
            ]);
            $this->bot->typesAndWaits(1);
            $this->askDate();
        });
    }

    public function askDate()
    {
        $question = Question::create("when did the incident happen? (format: YYYY-MM-DD e.g 2018-09-01).")
            ->fallback('Unable to ask question')
            ->callbackId('ask_legal_assistance');

        $this->ask($question, function(Answer $answer) {
            try {
                Carbon::parse($answer->getValue());
                $this->bot->userStorage()->save([
                    'date' => $answer->getValue(),
                ]);
                $this->bot->typesAndWaits(1);
                $this->confirmReportSubmission();
            } catch (\Exception $e) {
                $this->bot->typesAndWaits(1);
                $this->say('invalid date');
                $this->bot->typesAndWaits(1);
                $this->askDate();
            }
        });
    }

    public function confirmReportSubmission()
    {
        $submission = $this->bot->userStorage()->find();

        $report = new Report();
        $report->report_type_id = $submission->get('report_type_id');
        $report->user_id = 19;
        $report->title = "AsariTheBot: New Report";
        $report->description = $submission->get('description');
        $report->state_id = $submission->get('state_id');
        $report->victim = $submission->get('victim');
        $report->affiliation = $submission->get('affiliation');
        $report->assailant = $submission->get('assailant');
        $report->status_id = 4;
        $report->date = $submission->get('date');

        if($report->save()) {
            $this->say('Great. Your report has been submitted.');
        } else {
            $this->say('An error occurred. Type \'hello\' to start again.');
        }
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askName();
    }
}
