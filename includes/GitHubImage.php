<?php
class GitHubImage {
    public static function onLinkerMakeMediaLinkFile ( $title, $file, &$html, &$attribs, &$ret ) {
        global $wgXzGhiUsername, $wgXzGhiRepo;
        $attribs[ 'rel' ] = 'nofollow';
        $attribs[ 'class' ] = 'external text';
        $attribs[ 'href' ] = "https://github.com/$wgXzGhiUsername/$wgXzGhiRepo/blob/master/" . $title->mUrlform;
        return true;
    }
}