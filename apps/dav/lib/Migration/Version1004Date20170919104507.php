<?php
/**
 *
 *
 * @author Joas Schilling <coding@schilljs.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\DAV\Migration;

use Doctrine\DBAL\Schema\Schema;
use OCP\Migration\SimpleMigrationStep;
use OCP\Migration\IOutput;

class Version1004Date20170919104507 extends SimpleMigrationStep {

	/**
	 * @param IOutput $output
	 * @param \Closure $schemaClosure The `\Closure` returns a `Schema`
	 * @param array $options
	 * @return null|Schema
	 * @since 13.0.0
	 */
	public function changeSchema(IOutput $output, \Closure $schemaClosure, array $options) {
		/** @var Schema $schema */
		$schema = $schemaClosure();

		$table = $schema->getTable('addressbooks');
		$column = $table->getColumn('id');
		$column->setUnsigned(true);

		$table = $schema->getTable('calendarobjects');
		$column = $table->getColumn('id');
		$column->setUnsigned(true);

		$table = $schema->getTable('calendarchanges');
		$column = $table->getColumn('id');
		$column->setUnsigned(true);

		return $schema;
	}

}