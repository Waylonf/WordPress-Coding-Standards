<?php
/**
 * Enforces spacing around casting of variables, based upon Squiz code.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

if ( ! class_exists( 'Squiz_Sniffs_WhiteSpace_CastSpacingSniff', true ) ) {
	throw new PHP_CodeSniffer_Exception( 'Class Squiz_Sniffs_WhiteSpace_CastSpacingSniff not found' );
}

/**
 * Squiz_Sniffs_WhiteSpace_CastSpacingSniff.
 *
 * Ensure cast statements don't contain whitespace.
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 *
 * @since     0.xx.0 This sniff now extends the Squiz_Sniffs_WhiteSpace_CastSpacingSniff class it was based upon.
 * @since     0.xx.0 This sniff now has the ability to fix the issues it flags.
 *
 * Last synced with parent class August 2016 at commit 5def2acbe3911e2aea08ac8b8eb4e4d64330021f.
 * @link     https://github.com/squizlabs/PHP_CodeSniffer/blob/master/CodeSniffer/Standards/Squiz/Sniffs/WhiteSpace/CastSpacingSniff.php
 */
class WordPress_Sniffs_WhiteSpace_CastStructureSpacingSniff extends Squiz_Sniffs_WhiteSpace_CastSpacingSniff {

	/**
	 * Processes this test, when one of its tokens is encountered.
	 *
	 * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
	 * @param int                  $stackPtr  The position of the current token in the
	 *                                        stack passed in $tokens.
	 *
	 * @return void
	 */
	public function process( PHP_CodeSniffer_File $phpcsFile, $stackPtr ) {
		parent::process( $phpcsFile, $stackPtr );

		$tokens = $phpcsFile->getTokens();

		if ( T_WHITESPACE !== $tokens[ ( $stackPtr - 1 ) ]['code'] ) {
			$error = 'No space before opening casting parenthesis is prohibited';
			$fix   = $phpcsFile->addFixableWarning( $error, $stackPtr, 'NoSpaceBeforeOpenParenthesis' );
			if ( true === $fix ) {
				$phpcsFile->fixer->addContentBefore( $stackPtr, ' ' );
			}
		}

		if ( T_WHITESPACE !== $tokens[ ( $stackPtr + 1 ) ]['code'] ) {
			$error = 'No space after closing casting parenthesis is prohibited';
			$fix   = $phpcsFile->addFixableWarning( $error, $stackPtr, 'NoSpaceAfterCloseParenthesis' );
			if ( true === $fix ) {
				$phpcsFile->fixer->addContent( $stackPtr, ' ' );
			}
		}
	}

} // end class
