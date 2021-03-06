<?php
namespace Fisharebest\Webtrees;

/**
 * webtrees: online genealogy
 * Copyright (C) 2015 webtrees development team
 * Copyright (C) 2015 JustCarmen
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

class int_ancestry_plugin extends research_base_plugin {

	static function getPluginName() {
		return 'INT | Ancestry | $';
	}

	static function createLink($fullname, $givn, $first, $middle, $prefix, $surn, $surname) {
		$domain = array(
			// these are all the languages supported by ancestry. See: http://corporate.ancestry.com/about-ancestry/international/
			'de'	 => 'de', // German
			'en_GB'	 => 'co.uk',
			'en_US'	 => 'com',
			'en_AUS' => 'com.au', // not used by webtrees
			'fr'	 => 'fr',
			'it'	 => 'it',
			'sv'	 => 'se', // Swedish
		);
		// ancestry supports Canada in English and French versions, too; but webtrees doesn't support these language versions
		if (isset($domain[WT_LOCALE])) {
			$ancestry_domain = $domain[WT_LOCALE];
		} else {
			$ancestry_domain = $domain['en_US'];
		}

		return $link = 'http://search.ancestry.' . $ancestry_domain . '/cgi-bin/sse.dll?new=1&gsfn=' . $givn . '&gsln=' . $surname . '&gl=ROOT_CATEGORY&rank=1';
	}

}
