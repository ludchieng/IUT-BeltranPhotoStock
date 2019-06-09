<?php
namespace BeltranPhotoStock\Test;
use \PHPUnit\Framework\TestCase;
use \BeltranPhotoStock\Model\DAO;
require_once('model/DAO.php');
use \BeltranPhotoStock\Model\Client;
require_once('model/Client.php');
use \BeltranPhotoStock\Model\Photographer;
require_once('model/Photographer.php');
use \BeltranPhotoStock\Model\Admin;
require_once('model/Admin.php');
use \BeltranPhotoStock\Exception\NotFoundDBException;

class DAOTest extends TestCase {
  private $clientData = array(
    'id_client' => 1,
    0 => 1,
    'civilite' => 1,
    1 => 1,
    'nom' => 'Tennant',
    2 => 'Tennant',
    'prenom' => 'Clara',
    3 => 'Clara',
    'dateNaissance' => '1983-05-23',
    4 => '1983-05-23',
    'adresse' => '5 Square de la Couronne',
    5 => '5 Square de la Couronne',
    'cp' => '93500',
    6 => '93500',
    'ville' => 'Pantin',
    7 => 'Pantin',
    'pays' => 'France',
    8 => 'France',
    'telephone' => '+33115811099',
    9 => '+33115811099',
    'email' => 'clara.tennant@hotmail.fr',
    10 => 'clara.tennant@hotmail.fr',
    'hashIdentifiants' => '$2y$10$Y7z2bH9/pr6W6slKSYNZ0uIX6vJoaeU7jeonjGsZ82UaguXb.08rS',
    11 => '$2y$10$Y7z2bH9/pr6W6slKSYNZ0uIX6vJoaeU7jeonjGsZ82UaguXb.08rS',
    'disponible' => 1,
    12 => 1
  );
  private $photographerData = array(
    'id_photographe' => 1,
    0 => 1,
    'civilite' => 1,
    1 => 1,
    'numSiret' => '433481587-00007',
    2 => '433481587-00007',
    'ribIBAN' => 'FR5240177317412544113711048',
    3 => 'FR5240177317412544113711048',
    'nom' => 'Buenosia',
    4 => 'Buenosia',
    'prenom' => 'Carol',
    5 => 'Carol',
    'societe' => 'Buenosia Carol',
    6 => 'Buenosia Carol',
    'adresse' => '4 Place de la Madeleine',
    7 => '4 Place de la Madeleine',
    'cp' => '75011',
    8 => '75011',
    'ville' => 'Paris',
    9 => 'Paris',
    'pays' => 'France',
    10 => 'France',
    'telephone' => '+33421511748',
    11 => '+33421511748',
    'email' => 'bueno.carol@outlook.fr',
    12 => 'bueno.carol@outlook.fr',
    'hashIdentifiants' => '$2y$10$Bbq4BsN1pPXo09E6uHqGwO4I1izgegp0/EQIPz6/JiNhqDQLkuaXK',
    13 => '$2y$10$Bbq4BsN1pPXo09E6uHqGwO4I1izgegp0/EQIPz6/JiNhqDQLkuaXK',
    'disponible' => 1,
    14 => 1
  );
  private $adminData = array(
    'id_admin' => 5,
    0 => 5,
    'civilite' => 0,
    1 => 0,
    'nom' => 'Legault',
    2 => 'Legault',
    'prenom' => 'Charlot',
    3 => 'Charlot',
    'dateNaissance' => '1975-10-21',
    4 => '1975-10-21',
    'adresse' => '32 rue Gustave Eiffel',
    5 => '32 rue Gustave Eiffel',
    'cp' => '91130',
    6 => '91130',
    'ville' => 'Ris-orangis',
    7 => 'Ris-orangis',
    'pays' => 'France',
    8 => 'France',
    'telephone' => '+33176304137',
    9 => '+33176304137',
    'email' => 'c.legault@gustr.com',
    10 => 'c.legault@gustr.com',
    'hashIdentifiants' => '$2y$10$bmzDZ1cyWQDh5ZTnU2Fg4eQHlu2.cNcBV0HAltiiVTw2cNGJauqOa',
    11 => '$2y$10$bmzDZ1cyWQDh5ZTnU2Fg4eQHlu2.cNcBV0HAltiiVTw2cNGJauqOa',
    'disponible' => 1,
    12 => 1
  );



  public function testGetClientById() {
    $this->assertEquals($this->clientData, DAO::getClientById($this->clientData[0])->getData());
  }

  public function testGetPhotographerById() {
    $this->assertEquals($this->photographerData, DAO::getPhotographerById($this->photographerData[0])->getData());
  }

  public function testGetAdminById() {
    $this->assertEquals($this->adminData, DAO::getAdminById($this->adminData[0])->getData());
  }


  public function testGetClientById_addClient_delClient() {
    $clientArray = array (
    	'civilite' => 1,
    	'nom' => 'Gabrielle',
    	'prenom' => 'Datire',
    	'dateNaissance' => '1988-05-26',
    	'adresse' => '14 rue Girard',
    	'cp' => '91700',
    	'ville' => 'Sainte-geneviève-des-bois',
    	'pays' => 'France',
    	'telephone' => '+33195688611',
    	'email' => 'g.datir@hotmail.fr',
    	'hashIdentifiants' => '$2y$10$aQ0dxWZO6swbRLJIO4oFFe4bX2OKE/1tdwlnmgiNYiZgoL2gzojeu',
    	'disponible' => 1,
    );
    $clientDBData = array (
    	'id_client' => null,
    	0 => null,
    	'civilite' => 1,
    	1 => 1,
    	'nom' => 'Gabrielle',
    	2 => 'Gabrielle',
    	'prenom' => 'Datire',
    	3 => 'Datire',
    	'dateNaissance' => '1988-05-26',
    	4 => '1988-05-26',
    	'adresse' => '14 rue Girard',
    	5 => '14 rue Girard',
    	'cp' => '91700',
    	6 => '91700',
    	'ville' => 'Sainte-geneviève-des-bois',
    	7 => 'Sainte-geneviève-des-bois',
    	'pays' => 'France',
    	8 => 'France',
    	'telephone' => '+33195688611',
    	9 => '+33195688611',
    	'email' => 'g.datir@hotmail.fr',
    	10 => 'g.datir@hotmail.fr',
    	'hashIdentifiants' => '$2y$10$aQ0dxWZO6swbRLJIO4oFFe4bX2OKE/1tdwlnmgiNYiZgoL2gzojeu',
    	11 => '$2y$10$aQ0dxWZO6swbRLJIO4oFFe4bX2OKE/1tdwlnmgiNYiZgoL2gzojeu',
    	'disponible' => 1,
    	12 => 1
    );

    $idClient = DAO::addClient(new Client($clientArray));
    $clientDBData['id_client'] = $idClient;
    $clientDBData[0] = $idClient;
    $this->assertEquals($clientDBData, DAO::getClientById($idClient)->getData());
    DAO::delClient($idClient);
    $this->expectException(NotFoundDBException::class);
    DAO::getClientById($idClient);
  }


  public function testGetPhotographerById_addPhotographer_delPhotographer() {
    $pgrpherArray = array (
    	'civilite' => 1,
    	'numSiret' => '099284499-00003',
    	'ribIBAN' => 'FR9469171696100653885470266',
    	'nom' => 'Gabrielle',
    	'prenom' => 'Datire',
    	'societe' => 'Datir Photo',
    	'adresse' => '14 rue Girard',
    	'cp' => '91700',
    	'ville' => 'Sainte-geneviève-des-bois',
    	'pays' => 'France',
    	'telephone' => '+33195688611',
    	'email' => 'g.datir@hotmail.fr',
    	'hashIdentifiants' => '$2y$10$8dcdBx/kbgoApfpVM4LSou0.k98PgYtMMXId4KuNuHx8zLqFz.o7K',
    	'disponible' => 1,
    );
    $pgrpherDBData = array (
    	'id_photographe' => null,
    	0 => null,
    	'civilite' => 1,
    	1 => 1,
    	'numSiret' => '099284499-00003',
    	2 => '099284499-00003',
    	'ribIBAN' => 'FR9469171696100653885470266',
    	3 => 'FR9469171696100653885470266',
    	'nom' => 'Gabrielle',
    	4 => 'Gabrielle',
    	'prenom' => 'Datire',
    	5 => 'Datire',
      'societe' => 'Datir Photo',
    	6 => 'Datir Photo',
    	'adresse' => '14 rue Girard',
    	7 => '14 rue Girard',
    	'cp' => '91700',
    	8 => '91700',
    	'ville' => 'Sainte-geneviève-des-bois',
    	9 => 'Sainte-geneviève-des-bois',
    	'pays' => 'France',
    	10 => 'France',
    	'telephone' => '+33195688611',
    	11 => '+33195688611',
    	'email' => 'g.datir@hotmail.fr',
    	12 => 'g.datir@hotmail.fr',
    	'hashIdentifiants' => '$2y$10$8dcdBx/kbgoApfpVM4LSou0.k98PgYtMMXId4KuNuHx8zLqFz.o7K',
    	13 => '$2y$10$8dcdBx/kbgoApfpVM4LSou0.k98PgYtMMXId4KuNuHx8zLqFz.o7K',
    	'disponible' => 1,
    	14 => 1
    );

    $idPgrpher = DAO::addPhotographer(new Photographer($pgrpherArray));
    $pgrpherDBData['id_photographe'] = $idPgrpher;
    $pgrpherDBData[0] = $idPgrpher;
    $this->assertEquals($pgrpherDBData, DAO::getPhotographerById($idPgrpher)->getData());
    DAO::delPhotographer($idPgrpher);
    $this->expectException(NotFoundDBException::class);
    DAO::getPhotographerById($idPgrpher);
  }


  public function testGetAdminById_addAdmin_delAdmin() {
    $adminArray = array (
    	'civilite' => 1,
    	'nom' => 'Gabrielle',
    	'prenom' => 'Datire',
    	'dateNaissance' => '1988-05-26',
    	'adresse' => '14 rue Girard',
    	'cp' => '91700',
    	'ville' => 'Sainte-geneviève-des-bois',
    	'pays' => 'France',
    	'telephone' => '+33195688611',
    	'email' => 'g.datir@hotmail.fr',
    	'hashIdentifiants' => '$2y$10$8dcdBx/kbgoApfpVM4LSou0.k98PgYtMMXId4KuNuHx8zLqFz.o7K',
    	'disponible' => 1,
    );
    $adminDBData = array (
    	'id_admin' => null,
    	0 => null,
    	'civilite' => 1,
    	1 => 1,
    	'nom' => 'Gabrielle',
    	2 => 'Gabrielle',
    	'prenom' => 'Datire',
    	3 => 'Datire',
    	'dateNaissance' => '1988-05-26',
    	4 => '1988-05-26',
    	'adresse' => '14 rue Girard',
    	5 => '14 rue Girard',
    	'cp' => '91700',
    	6 => '91700',
    	'ville' => 'Sainte-geneviève-des-bois',
    	7 => 'Sainte-geneviève-des-bois',
    	'pays' => 'France',
    	8 => 'France',
    	'telephone' => '+33195688611',
    	9 => '+33195688611',
    	'email' => 'g.datir@hotmail.fr',
    	10 => 'g.datir@hotmail.fr',
    	'hashIdentifiants' => '$2y$10$8dcdBx/kbgoApfpVM4LSou0.k98PgYtMMXId4KuNuHx8zLqFz.o7K',
    	11 => '$2y$10$8dcdBx/kbgoApfpVM4LSou0.k98PgYtMMXId4KuNuHx8zLqFz.o7K',
    	'disponible' => 1,
    	12 => 1
    );

    $idAdmin = DAO::addAdmin(new Admin($adminArray));
    $adminDBData['id_admin'] = $idAdmin;
    $adminDBData[0] = $idAdmin;
    $this->assertEquals($adminDBData, DAO::getAdminById($idAdmin)->getData());
    DAO::delAdmin($idAdmin);
    $this->expectException(NotFoundDBException::class);
    DAO::getAdminById($idAdmin);
  }
}
