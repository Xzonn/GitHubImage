<?php
class XzImageHandler extends BitmapHandler {
	function doTransform( $image, $dstPath, $dstUrl, $params, $flags = 0 ) {
		if ( !$this->normaliseParams( $image, $params ) ) {
			return new TransformParameterError( $params );
		}
        global $wgXzGhiUsername, $wgXzGhiRepo, $wgXzHashed, $wgHashedUploadDirectory;
		$subPath = '';
		if ( $wgXzHashed and $wgHashedUploadDirectory ) {
			$md5 = md5(str_replace('_', ' ', $image->getName()));
			$subPath = substr( $md5, 0, 1 ) . '/' . substr( $md5, 0, 2 ) . '/';
		}
        return new ThumbnailImage( $image, "https://cdn.jsdelivr.net/gh/$wgXzGhiUsername/$wgXzGhiRepo/$subPath" . $image->getName(), null, $params );
	}
}
class XzSvgHandler extends SvgHandler {
	public function doTransform( $image, $dstPath, $dstUrl, $params, $flags = 0 ) {
		if ( !$this->normaliseParams( $image, $params ) ) {
			return new TransformParameterError( $params );
		}
        global $wgXzGhiUsername, $wgXzGhiRepo, $wgXzHashed, $wgHashedUploadDirectory;
		$subPath = '';
		if ( $wgXzHashed and $wgHashedUploadDirectory ) {
			$md5 = md5(str_replace('_', ' ', $image->getName()));
			$subPath = substr( $md5, 0, 1 ) . '/' . substr( $md5, 0, 2 ) . '/';
		}
		return new SvgImage( $image, "https://cdn.jsdelivr.net/gh/$wgXzGhiUsername/$wgXzGhiRepo/$subPath" . $image->getName(), $params['width'], $params['height'], $image->getPath() );
	}

	public function getThumbType( $ext, $mime, $params = null ) {
		return [ 'svg', 'image/svg+xml' ];
	}
}