<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Services\TickerCreator;
use Nette;
use App\Services\CardReaderService;
use Nette\Forms\Form;
use Nette\Http\Request;

/**
 * @route("Card")
 */
final class CardPresenter extends Nette\Application\UI\Presenter {
    /** @var Request @inject */
    public $httpRequest;

    public function __construct(Request $httpRequest)
    {
        parent::__construct();
        $this->httpRequest = $httpRequest;
    }

    public function RegisterCard(int $cardNumber) : void{
        $cardReader = new CardReaderService();
        $ticketCreator = new TickerCreator();
        $open = $cardReader->checkOpen($cardNumber);
        if ($open) $created = $ticketCreator->createTicket([]);
        $this->redirect('result', ['cardNumber' => $cardNumber, 'created' => $created ?? false]);
    }

    public function actionResult() : void {
        if ($this->httpRequest->isMethod('POST')) {
            $form = $this->httpRequest->getPost();
            $cardNumber = $form['cardNumber'];
            $this->RegisterCard((int) $cardNumber);
        }
    }

    public function renderResult($created, $cardNumber = null) : void {
        $this->template->cardNumber = $cardNumber;
        $this->template->created = $created;
    }
}
