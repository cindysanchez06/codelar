<?php

namespace App\Form;

use App\Entity\Coach;
use App\Services\PokemonService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoachType extends AbstractType
{
    private $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $pokemons = $this->pokemonService->getPokemons();
        $pokemonsFormater = [];
        foreach ($pokemons as $pokemon)
        {
            $pokemonsFormater[$pokemon['name']] =  $pokemon['id'];
        }

        $builder
            ->add('name', TextType::class, [
                'required' => true
            ])
            ->add('avatar', TextType::class, [
                'required' => true
            ])
            ->add('pokemons', ChoiceType::class, [
                'multiple' => true,
                'choices' => $pokemonsFormater,
                'mapped' => false
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coach::class,
        ]);
    }
}
