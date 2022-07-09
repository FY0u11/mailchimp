<?php

namespace Mailchimp\Api\BatchOperations;

use Mailchimp\Api\BaseObject;

/**
 * An array of objects that describes operations to perform.
 */
class Operations extends BaseObject
{
    /**
     * @var string|null
     * The HTTP method to use for the operation. Possible values: "GET", "POST", "PUT", "PATCH", or "DELETE".
     */
    public ?string $method;

    /**
     * @var string|null
     * The relative path to use for the operation.
     */
    public ?string $path;

    /**
     * @var array|null
     * Any request query parameters. Example parameters: {"count":10, "offset":0}
     */
    public ?array $params;

    /**
     * @var string|null
     * A string containing the JSON body to use with the request.
     */
    public ?string $body;

    /**
     * @var string|null
     * An optional client-supplied id returned with the operation results.
     */
    public ?string $operation_id;

    /**
     * An array of objects that describes operations to perform.
     *
     * @param string|null $method
     * The HTTP method to use for the operation. Possible values: "GET", "POST", "PUT", "PATCH", or "DELETE".
     * @param string|null $path
     * The relative path to use for the operation.
     * @param array|null $params
     * Any request query parameters. Example parameters: {"count":10, "offset":0}
     * @param string|null $body
     * A string containing the JSON body to use with the request.
     * @param string|null $operation_id
     * An optional client-supplied id returned with the operation results.
     */
    public function __construct(
        ?string $method=null,
        ?string $path=null,
        ?array $params=null,
        ?string $body=null,
        ?string $operation_id=null
    ) {
        $this->method = $method;
        $this->path = $path;
        $this->params = $params;
        $this->body = $body;
        $this->operation_id = $operation_id;
    }
}
