<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Materiel;
use App\Entity\Ticket;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('dateCreation')
            ->add('description')
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'placeholder' => 'Sélectionner un client'
            ])
            ->add('materiel', EntityType::class, [
                'class' => Materiel::class,
                'placeholder' => 'Sélectionner un matériel'
            ]);
        // $formModifier = function (FormInterface $form, Client $client = null) {
        //     $materiels = null === $client ? [] : $client->getMateriels();

        //     $form->add('materiel', EntityType::class, [
        //         'class' => Materiel::class,
        //         'placeholder' => '',
        //         'choices' => $materiels,
        //     ]);
        // };

        // $builder->addEventListener(
        //     FormEvents::PRE_SET_DATA,
        //     function (FormEvent $event) use ($formModifier) {
        //         // this would be your entity, i.e. clientMeetup
        //         $data = $event->getData();

        //         $formModifier($event->getForm(), $data->getClient());
        //     }
        // );

        // $builder->get('client')->addEventListener(
        //     FormEvents::POST_SUBMIT,
        //     function (FormEvent $event) use ($formModifier) {
        //         // It's important here to fetch $event->getForm()->getData(), as
        //         // $event->getData() will get you the client data (that is, the ID)
        //         $client = $event->getForm()->getData();

        //         // since we've added the listener to the child, we'll have to pass on
        //         // the parent to the callback function!
        //         $formModifier($event->getForm()->getParent(), $client);
        //     }
        // );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
