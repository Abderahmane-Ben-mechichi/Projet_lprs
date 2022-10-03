<?php

class Utilisateur{
    private $nom;
    private $prenom;
    private $email;
    private $motdepasse;
    private $adresse;
    private $valider;
    private $domaine_etude;
    private $niveau_etude;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function UtilisateurConnexion (Bdd $base){

        $req = $base->getBdd()->prepare('SELECT * FROM utilisateur_eleves WHERE email = :email  AND motdepasse = :motdepasse AND valider = 1 ');

        $req->execute(array(
            'email' => $this->email,
            'motdepasse' => $this->motdepasse
        ));

        $res = $req->fetch();

        if ($res) {

            if ($res['valide'] == 1) {
                header('Location: ../Erreur/dist/validation.html');
            }
            $_SESSION['id_eleves'] = $res['id_eleves'];
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['prenom'] = $res['prenom'];
            //header('Location: ../index.php');
        }

        if (!($res)){
            echo ('mot de passe ou email incorrecte');
        }

        return $res;

    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * @param mixed $motdepasse
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * @param mixed $valider
     */
    public function setValider($valider)
    {
        $this->valider = $valider;
    }

    /**
     * @return mixed
     */
    public function getDomaineEtude()
    {
        return $this->domaine_etude;
    }

    /**
     * @param mixed $domaine_etude
     */
    public function setDomaineEtude($domaine_etude)
    {
        $this->domaine_etude = $domaine_etude;
    }

    /**
     * @return mixed
     */
    public function getNiveauEtude()
    {
        return $this->niveau_etude;
    }

    /**
     * @param mixed $niveau_etude
     */
    public function setNiveauEtude($niveau_etude)
    {
        $this->niveau_etude = $niveau_etude;
    }


}