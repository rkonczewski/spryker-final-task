<?php

namespace PyzTest\Zed\Faq\Business;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\FaqBuilder;
use Generated\Shared\Transfer\FaqTransfer;

class FaqFacadeTest extends Unit
{
    protected $tester;

    /**
     * @return FaqTransfer
     */
    public function testFaqIsCreated(): FaqTransfer
    {
        $faqTransfer = (new FaqBuilder([
            'question' => 'lorem ipsum dolor?',
            'answer' => 'ipsum dolor lorem dolar euro'
        ]))->build();

        return $this->tester->getFacade()->createFaqEntity($faqTransfer);
    }

//    /**
//     * @return FaqTransfer
//     */
//    public function testFaqIsNotCreatedEmptyData(): FaqTransfer
//    {
//        $faqTransfer = (new FaqBuilder([
//            'question' => null,
//            'answer' => null
//        ]))->build();
//
//        return $this->tester->getFacade()->createFaqEntity($faqTransfer);
//    }

    /**
     * @return mixed
     */
    public function testFaqIsDeleted()
    {
        $faqTransfer = (new FaqBuilder([
            'idQuestion' => 1,
        ]))->build();

        return $this->tester->getFacade()->deleteFaqEntity($faqTransfer);
    }

    /**
     * @return FaqTransfer
     */
    public function testFindFaqById(): FaqTransfer
    {
        $faqTransfer = (new FaqBuilder([
            'idQuestion' => 1,
        ]))->build();

        return $this->tester->getFacade()->findFaqById($faqTransfer);
    }
}
