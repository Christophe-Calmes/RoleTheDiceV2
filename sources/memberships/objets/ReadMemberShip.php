<?php 
Class GetMemberShip {
  protected function GetAllUserAdmin ($valide) {
    $select = "SELECT `idUser`, `IdMember`, `token`, `email`, `prenom`, `nom`, `login`, `mdp`, `valide`, `role`, `dateCreation` FROM `users` WHERE `valide` = :id";
    $param = [['prep'=>':valide', 'variable'=>$valide]];
    return ActionDB::select($select, $param);
  }
  protected function GetOneUserAdmin ($valide, $searchingFirstOrLastname) {
    $select = "SELECT  `IdMember`, `token`, `email`, `prenom`, `nom`, `login`, `valide`, `role`, `dateCreation` FROM `users` WHERE (`prenom` LIKE :search OR `nom` LIKE :search OR `login` LIKE :search ) AND valide = :valide";
    $param = [['prep'=>':valide', 'variable'=>$valide],
            ['prep'=>':search', 'variable'=> $searchingFirstOrLastname]];
    return ActionDB::select($select, $param);
  }

}