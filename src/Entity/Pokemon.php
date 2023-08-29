<?php

namespace App\Entity;

use App\Repository\PokemonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokemonRepository::class)]
#[ORM\Index(columns: ['name', 'type1', 'type2'], name: 'recherche', flags: ['fulltext'])]


class Pokemon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id;

    #[ORM\Column(length: 255)]
    public ?string $name;

    #[ORM\Column(length: 255)]
    public ?string $background = null;

    #[ORM\Column]
    public ?int $generation = null;

    #[ORM\Column(length: 255)]
    public ?string $imgPokemon = null;

    #[ORM\Column(length: 255)]
    public ?string $imgType1 = null;

    #[ORM\Column(length: 255)]
    public ?string $type1 = null;

    #[ORM\Column(length: 255)]
    public ?string $imgType2 = null;

    #[ORM\Column(length: 255)]
    public ?string $type2 = null;

    #[ORM\Column]
    public ?int $hp = null;

    #[ORM\Column]
    public ?int $attack = null;

    #[ORM\Column]
    public ?int $defense = null;

    #[ORM\Column]
    public ?int $specialAttack = null;

    #[ORM\Column]
    public ?int $specialDefense = null;

    #[ORM\Column]
    public ?int $speed = null;

    #[ORM\Column(length: 255)]
    public ?string $normal = null;

    #[ORM\Column(length: 255)]
    public ?string $combat = null;

    #[ORM\Column(length: 255)]
    public ?string $vol = null;

    #[ORM\Column(length: 255)]
    public ?string $roche = null;

    #[ORM\Column(length: 255)]
    public ?string $insecte = null;

    #[ORM\Column(length: 255)]
    public ?string $spectre = null;

    #[ORM\Column(length: 255)]
    public ?string $acier = null;

    #[ORM\Column(length: 255)]
    public ?string $feu = null;

    #[ORM\Column(length: 255)]
    public ?string $eau = null;

    #[ORM\Column(length: 255)]
    public ?string $plante = null;

    #[ORM\Column(length: 255)]
    public ?string $electrik = null;

    #[ORM\Column(length: 255)]
    public ?string $psy = null;

    #[ORM\Column(length: 255)]
    public ?string $glace = null;

    #[ORM\Column(length: 255)]
    public ?string $dragon = null;

    #[ORM\Column(length: 255)]
    public ?string $tenebres = null;

    #[ORM\Column(length: 255)]
    public ?string $fee = null;

    #[ORM\Column(length: 255)]
    public ?string $poison = null;

    #[ORM\Column(length: 255)]
    public ?string $sol = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'favoris')]
    private Collection $favoris;

    public function __construct()
    {
        $this->favoris = new ArrayCollection();
    }




    
    


    // public function setName(string $name): self
    // {
    //     $this->name = $name;

    //     return $this;
    // }

    // public function getBackground(): ?string
    // {
    //     return $this->background;
    // }

    // public function setBackground(string $background): self
    // {
    //     $this->background = $background;

    //     return $this;
    // }

    // public function getGeneration(): ?int
    // {
    //     return $this->generation;
    // }

    // public function setGeneration(int $generation): self
    // {
    //     $this->generation = $generation;

    //     return $this;
    // }

    // public function getImgPokemon(): ?string
    // {
    //     return $this->imgPokemon;
    // }

    // public function setImgPokemon(string $img_pokemon): self
    // {
    //     $this->imgPokemon = $img_pokemon;

    //     return $this;
    // }

    // public function getImgType1(): ?string
    // {
    //     return $this->imgType1;
    // }

    // public function setImgType1(string $img_type1): self
    // {
    //     $this->imgType1 = $img_type1;

    //     return $this;
    // }

    // public function getType1(): ?string
    // {
    //     return $this->type1;
    // }

    // public function setType1(string $type1): self
    // {
    //     $this->type1 = $type1;

    //     return $this;
    // }

    // public function getImgType2(): ?string
    // {
    //     return $this->imgType2;
    // }

    // public function setImgType2(string $img_type2): self
    // {
    //     $this->imgType2 = $img_type2;

    //     return $this;
    // }

    // public function getType2(): ?string
    // {
    //     return $this->type2;
    // }

    // public function setType2(string $type2): self
    // {
    //     $this->type2 = $type2;

    //     return $this;
    // }

    // public function getHp(): ?int
    // {
    //     return $this->hp;
    // }

    // public function setHp(int $hp): self
    // {
    //     $this->hp = $hp;

    //     return $this;
    // }

    // public function getAttack(): ?int
    // {
    //     return $this->attack;
    // }

    // public function setAttack(int $attack): self
    // {
    //     $this->attack = $attack;

    //     return $this;
    // }

    // public function getDefense(): ?string
    // {
    //     return $this->defense;
    // }

    // public function setDefense(string $defense): self
    // {
    //     $this->defense = $defense;

    //     return $this;
    // }

    // public function getSpecialAttack(): ?int
    // {
    //     return $this->specialAttack;
    // }

    // public function setSpecialAttack(int $special_attack): self
    // {
    //     $this->specialAttack = $special_attack;

    //     return $this;
    // }

    // public function getSpecialDefense(): ?int
    // {
    //     return $this->specialDefense;
    // }

    // public function setSpecialDefense(int $special_defense): self
    // {
    //     $this->specialDefense = $special_defense;

    //     return $this;
    // }

    // public function getSpeed(): ?int
    // {
    //     return $this->speed;
    // }

    // public function setSpeed(int $speed): self
    // {
    //     $this->speed = $speed;

    //     return $this;
    // }

    // public function getNormal(): ?string
    // {
    //     return $this->normal;
    // }

    // public function setNormal(string $normal): self
    // {
    //     $this->normal = $normal;

    //     return $this;
    // }

    // public function getCombat(): ?string
    // {
    //     return $this->combat;
    // }

    // public function setCombat(string $combat): self
    // {
    //     $this->combat = $combat;

    //     return $this;
    // }

    // public function getVol(): ?string
    // {
    //     return $this->vol;
    // }

    // public function setVol(string $vol): self
    // {
    //     $this->vol = $vol;

    //     return $this;
    // }

    // public function getRoche(): ?string
    // {
    //     return $this->roche;
    // }

    // public function setRoche(string $roche): self
    // {
    //     $this->roche = $roche;

    //     return $this;
    // }

    // public function getInsecte(): ?string
    // {
    //     return $this->insecte;
    // }

    // public function setInsecte(string $insecte): self
    // {
    //     $this->insecte = $insecte;

    //     return $this;
    // }

    // public function getSpectre(): ?string
    // {
    //     return $this->spectre;
    // }

    // public function setSpectre(string $spectre): self
    // {
    //     $this->spectre = $spectre;

    //     return $this;
    // }

    // public function getAcier(): ?string
    // {
    //     return $this->acier;
    // }

    // public function setAcier(string $acier): self
    // {
    //     $this->acier = $acier;

    //     return $this;
    // }

    // public function getFeu(): ?string
    // {
    //     return $this->feu;
    // }

    // public function setFeu(string $feu): self
    // {
    //     $this->feu = $feu;

    //     return $this;
    // }

    // public function getEau(): ?string
    // {
    //     return $this->eau;
    // }

    // public function setEau(string $eau): self
    // {
    //     $this->eau = $eau;

    //     return $this;
    // }

    // public function getPlante(): ?string
    // {
    //     return $this->plante;
    // }

    // public function setPlante(string $plante): self
    // {
    //     $this->plante = $plante;

    //     return $this;
    // }

    // public function getElectrik(): ?string
    // {
    //     return $this->electrik;
    // }

    // public function setElectrik(string $electrik): self
    // {
    //     $this->electrik = $electrik;

    //     return $this;
    // }

    // public function getPsy(): ?string
    // {
    //     return $this->psy;
    // }

    // public function setPsy(string $psy): self
    // {
    //     $this->psy = $psy;

    //     return $this;
    // }

    // public function getGlace(): ?string
    // {
    //     return $this->glace;
    // }

    // public function setGlace(string $glace): self
    // {
    //     $this->glace = $glace;

    //     return $this;
    // }

    // public function getDragon(): ?string
    // {
    //     return $this->dragon;
    // }

    // public function setDragon(string $dragon): self
    // {
    //     $this->dragon = $dragon;

    //     return $this;
    // }

    // public function getTenebres(): ?string
    // {
    //     return $this->tenebres;
    // }

    // public function setTenebres(string $tenebres): self
    // {
    //     $this->tenebres = $tenebres;

    //     return $this;
    // }

    // public function getFee(): ?string
    // {
    //     return $this->fee;
    // }

    // public function setFee(string $fee): self
    // {
    //     $this->fee = $fee;

    //     return $this;
    // }


    // public function getPoison(): ?string
    // {
    //     return $this->poison;
    // }

    // public function setPoison(string $poison): self
    // {
    //     $this->poison = $poison;

    //     return $this;
    // }

    // public function getSol(): ?string
    // {
    //     return $this->sol;
    // }

    // public function setSol(string $sol): self
    // {
    //     $this->sol = $sol;

    //     return $this;
    // }

    /**
     * @return Collection<int, User>
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(User $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris->add($favori);
        }
        return $this;
    }

    public function removeFavori(User $favori): self
    {
        $this->favoris->removeElement($favori);
        return $this;
    }





}
