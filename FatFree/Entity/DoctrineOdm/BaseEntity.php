<?php
namespace FatFree\Entity\DoctrineOdm;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use FatFree\Helpers\ModelMethodsHelper;
use FatFree\Entity\MapperTrait;

/**
 * @ODM\MappedSuperclass()
 */
abstract class BaseEntity extends ModelMethodsHelper
{
	/**
	 * Default ID filed name from IdentifierTriat
	 */
	const APP_ENUM_DOCTRINEODM_ENTITY_ID = 'id';

	use IdentifierTrait;
	use MapperTrait;
	use SafeDeleteTrait;
	use LanguageTrait;
	use DatetimeTrait;
}
