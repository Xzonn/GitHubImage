<?php
class GitHubImage {
    public static function onLinkerMakeMediaLinkFile ( $title, $file, &$html, &$attribs, &$ret ) {
        global $wgXzGhiUsername, $wgXzGhiRepo, $wgXzHashed, $wgHashedUploadDirectory;
		$subPath = '';
		if ( $wgXzHashed and $wgHashedUploadDirectory ) {
			$md5 = md5(str_replace('_', ' ', $file->getName()));
			$subPath = substr( $md5, 0, 1 ) . '/' . substr( $md5, 0, 2 ) . '/';
		}
        $attribs[ 'rel' ] = 'nofollow';
        $attribs[ 'class' ] = 'external text';
        $attribs[ 'href' ] = "https://github.com/$wgXzGhiUsername/$wgXzGhiRepo/blob/master/$subPath" . $title->mUrlform;
        return true;
    }
}