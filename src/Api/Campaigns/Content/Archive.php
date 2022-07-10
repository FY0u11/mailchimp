<?php

namespace Mailchimp\Api\Campaigns\Content;

use Mailchimp\Api\BaseObject;

/**
 * Available when uploading an archive to create campaign content. The archive should include all campaign content and
 * images.
 */
class Archive extends BaseObject implements ArchiveInterface
{
    /**
     * @var string|null
     * The base64-encoded representation of the archive file.
     */
    public ?string $archive_content;

    /**
     * @var string|null
     * The type of encoded file. Defaults to zip. Possible values: "zip", "tar.gz", "tar.bz2", "tar", "tgz", or "tbz".
     */
    public ?string $archive_type;

    /**
     * Available when uploading an archive to create campaign content. The archive should include all campaign content
     * and images.
     *
     * @param string|null $archive_content
     * The base64-encoded representation of the archive file.
     * @param string|null $archive_type
     * The type of encoded file. Defaults to zip. Possible values: "zip", "tar.gz", "tar.bz2", "tar", "tgz", or "tbz".
     */
    public function __construct(?string $archive_content=null, ?string $archive_type=null)
    {
        $this->archive_content = $archive_content;
        $this->archive_type = $archive_type;
    }
}
