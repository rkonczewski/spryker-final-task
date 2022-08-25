<?php

namespace Pyz\Zed\Faq\Communication\Form;

use Generated\Shared\Transfer\FaqTransfer;
use Spryker\Zed\Kernel\Communication\Form\AbstractCollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class FaqForm extends AbstractCollectionType
{
    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return 'faq';
    }

    public const BUTTON_SUBMIT = 'Submit';

    /**
     * @param OptionsResolver $resolver
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults([
            'data_class' => FaqTransfer::class
        ]);
    }

    private const FIELD_QUESTION = 'question';
    private const FIELD_ANSWER = 'answer';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addQuestionField($builder)
            ->addAnswerField($builder)
            ->addSubmitButton($builder);
    }

    /**
     * @param FormBuilderInterface $builder
     * @return FaqForm
     */
    private function addQuestionField(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::FIELD_QUESTION, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 10,
                    'minMessage' => 'Question minimum length is at least {{ length }}.',
                    'max' => 100,
                    'maxMessage' => 'Question maximum length is {{ length }}',
                ])
            ]
        ]);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return FaqForm
     */
    private function addAnswerField(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::FIELD_ANSWER, TextType::class, [
            'constraints' => [
                new NotBlank(),
                new Length([
                    'min' => 10,
                    'minMessage' => 'Answer minimum length is at least {{ length }}.',
                    'max' => 255,
                    'maxMessage' => 'Answer maximum length is {{ length }}',
                ])
            ]
        ]);

        return $this;
    }

    /**
     * @param FormBuilderInterface $builder
     * @return FaqForm
     */
    private function addSubmitButton(FormBuilderInterface $builder): FaqForm
    {
        $builder->add(static::BUTTON_SUBMIT, SubmitType::class);

        return $this;
    }
}
