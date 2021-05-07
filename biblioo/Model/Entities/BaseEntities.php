<?php 

namespace Model\Entities;

class BaseEntities {
    protected $id;

    public function getId(){

        return $this->id;
    }

    /**
     * La méthode magique __toString est exécutée lorsque qu'un objet est utilisé ou est transformé en
     * un string. Si cette méthode n'est pas redéfini dans la classe, essayer d'utiliser 
     * un objet comme un string génère une erreur.
     * Ici la chaîne retournée sera le nom de l'entité en minuscule
     */
    public function __toString()
    {
        $tab = explode("\\", get_called_class());
        $classe = $tab[ count($tab) - 1 ];
        return lcfirst($classe);
    }

    /**
     * Retourne toutes les propriétés de la classe.
     * NB : dans les classes enfants, seules les propriétés protégées et publiques
     *      sont retournées. Pour avoir les privées, il faut redéclarer la méthode
     *      dans la classe.
     * 
     * @return array
     */
    public function proprietes()
    {
        /**
         * La fonction get_object_vars retourne toutes les propriétés accessibles d'un objet
         * (ici elle est appelé dans la classe, donc toutes les propriétés même privées sont retournées)
         */
        return get_object_vars($this);
    }
}