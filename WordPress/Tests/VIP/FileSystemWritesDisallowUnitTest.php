<?php
/**
 * Unit test class for WordPress Coding Standard.
 *
 * @package PHP\CodeSniffer\WordPress-Coding-Standards
 * @link    https://make.wordpress.org/core/handbook/best-practices/coding-standards/
 * @link    https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards
 * @license https://opensource.org/licenses/MIT MIT
 */

/**
 * Unit test class for the FileSystemWritesDisallow sniff.
 *
 * @package PHP\CodeSniffer\WordPress-Coding-Standards
 * @author  Shady Sharaf <shady@x-team.com>
 * @since   0.3.0
 */
class WordPress_Tests_VIP_FileSystemWritesDisallowUnitTest extends AbstractSniffUnitTest {

	/**
	 * Returns the lines where errors should occur.
	 *
	 * @return array <int line number> => <int number of errors>
	 */
	public function getErrorList() {
		return array(
			3  => 1,
			9  => 1,
			10 => 1,
			12 => 1,
		);

	}

	/**
	 * Returns the lines where warnings should occur.
	 *
	 * @return array <int line number> => <int number of warnings>
	 */
	public function getWarningList() {
		return array();

	}

} // End class.
