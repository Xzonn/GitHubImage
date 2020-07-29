<?php
class XzImageHandler extends BitmapHandler {
	function doTransform( $image, $dstPath, $dstUrl, $params, $flags = 0 ) {
        global $wgXzGhiUsername, $wgXzGhiRepo;
		if ( !$this->normaliseParams( $image, $params ) ) {
			return new TransformParameterError( $params );
        }
        return new ThumbnailImage( $image, "https://cdn.jsdelivr.net/gh/$wgXzGhiUsername/$wgXzGhiRepo/" . $image->getName(), null, $params );
	}
}
class XzSvgHandler extends SvgHandler {
	public function doTransform( $image, $dstPath, $dstUrl, $params, $flags = 0 ) {
        global $wgXzGhiUsername, $wgXzGhiRepo;
		if ( !$this->normaliseParams( $image, $params ) ) {
			return new TransformParameterError( $params );
		}

		return new SvgImage( $image, "https://cdn.jsdelivr.net/gh/$wgXzGhiUsername/$wgXzGhiRepo/" . $image->getName(), $params['width'], $params['height'], $image->getPath() );
	}

	public function getThumbType( $ext, $mime, $params = null ) {
		return [ 'svg', 'image/svg+xml' ];
	}
}