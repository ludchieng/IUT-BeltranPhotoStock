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
    'nom' => 'Bérard',
    2 => 'Bérard',
    'prenom' => 'Robinette',
    3 => 'Robinette',
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
    'email' => 'bera.robinette@hotmail.fr',
    10 => 'bera.robinette@hotmail.fr',
    'hashIdentifiants' => 'Overminer',
    11 => 'Overminer',
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
    'hashIdentifiants' => 'Purpectiod',
    13 => 'Purpectiod',
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
    'hashIdentifiants' => 'lelele',
    11 => 'lelele',
    'disponible' => 1,
    12 => 1
  );
  private $dao;

  //Before
  public function setUp(): void {
    $this->dao = new DAO();
  }

  //After
  public function tearDown(): void {
    $this->dao = null;
  }



  public function testGetClientById() {
    $this->assertEquals($this->clientData, $this->dao->getClientById($this->clientData[0])->getData());
  }

  public function testGetPhotographerById() {
    $this->assertEquals($this->photographerData, $this->dao->getPhotographerById($this->photographerData[0])->getData());
  }

  public function testGetAdminById() {
    $this->assertEquals($this->adminData, $this->dao->getAdminById($this->adminData[0])->getData());
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
    	'hashIdentifiants' => 'Haboutt2',
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
    	'hashIdentifiants' => 'Haboutt2',
    	11 => 'Haboutt2',
    	'disponible' => 1,
    	12 => 1
    );

    $idClient = $this->dao->addClient(new Client($clientArray));
    $clientDBData['id_client'] = $idClient;
    $clientDBData[0] = $idClient;
    $this->assertEquals($clientDBData, $this->dao->getClientById($idClient)->getData());
    $this->dao->delClient($idClient);
    $this->expectException(NotFoundDBException::class);
    $this->dao->getClientById($idClient);
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
    	'hashIdentifiants' => 'Haboutt2',
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
    	'hashIdentifiants' => 'Haboutt2',
    	13 => 'Haboutt2',
    	'disponible' => 1,
    	14 => 1
    );

    $idPgrpher = $this->dao->addPhotographer(new Photographer($pgrpherArray));
    $pgrpherDBData['id_photographe'] = $idPgrpher;
    $pgrpherDBData[0] = $idPgrpher;
    $this->assertEquals($pgrpherDBData, $this->dao->getPhotographerById($idPgrpher)->getData());
    $this->dao->delPhotographer($idPgrpher);
    $this->expectException(NotFoundDBException::class);
    $this->dao->getPhotographerById($idPgrpher);
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
    	'hashIdentifiants' => 'Haboutt2',
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
    	'hashIdentifiants' => 'Haboutt2',
    	11 => 'Haboutt2',
    	'disponible' => 1,
    	12 => 1
    );

    $idAdmin = $this->dao->addAdmin(new Admin($adminArray));
    $adminDBData['id_admin'] = $idAdmin;
    $adminDBData[0] = $idAdmin;
    $this->assertEquals($adminDBData, $this->dao->getAdminById($idAdmin)->getData());
    $this->dao->delAdmin($idAdmin);
    $this->expectException(NotFoundDBException::class);
    $this->dao->getAdminById($idAdmin);
  }
}
