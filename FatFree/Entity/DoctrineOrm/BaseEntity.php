<?php
namespace FatFree\Entity\DoctrineOrm;

use Doctrine\ORM\Mapping as ORM;
use FatFree\Helpers\ModelMethodsHelper;
use FatFree\Entity\MapperTrait;

/**
 * @ORM\MappedSuperclass()
 */
abstract class BaseEntity extends ModelMethodsHelper
{
	/**
	 * Default ID filed name from IdentifierTriat
	 */
	const APP_ENUM_DOCTRINEORM_ENTITY_ID = 'id';

	use IdentifierTrait;
	use MapperTrait;
	use SafeDeleteTrait;
	use LanguageTrait;
	use DatetimeTrait;
}
