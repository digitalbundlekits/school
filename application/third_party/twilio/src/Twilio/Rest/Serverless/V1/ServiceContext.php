<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Serverless
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Serverless\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Rest\Serverless\V1\Service\FunctionList;
use Twilio\Rest\Serverless\V1\Service\BuildList;
use Twilio\Rest\Serverless\V1\Service\EnvironmentList;
use Twilio\Rest\Serverless\V1\Service\AssetList;


/**
 * @property FunctionList $functions
 * @property BuildList $builds
 * @property EnvironmentList $environments
 * @property AssetList $assets
 * @method \Twilio\Rest\Serverless\V1\Service\EnvironmentContext environments(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\FunctionContext functions(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\BuildContext builds(string $sid)
 * @method \Twilio\Rest\Serverless\V1\Service\AssetContext assets(string $sid)
 */
class ServiceContext extends InstanceContext
    {
    protected $_functions;
    protected $_builds;
    protected $_environments;
    protected $_assets;

    /**
     * Initialize the ServiceContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The `sid` or `unique_name` of the Service resource to delete.
     */
    public function __construct(
        Version $version,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'sid' =>
            $sid,
        ];

        $this->uri = '/Services/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Delete the ServiceInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        return $this->version->delete('DELETE', $this->uri);
    }


    /**
     * Fetch the ServiceInstance
     *
     * @return ServiceInstance Fetched ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ServiceInstance
    {

        $payload = $this->version->fetch('GET', $this->uri);

        return new ServiceInstance(
            $this->version,
            $payload,
            $this->solution['sid']
        );
    }


    /**
     * Update the ServiceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): ServiceInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'IncludeCredentials' =>
                Serialize::booleanToString($options['includeCredentials']),
            'FriendlyName' =>
                $options['friendlyName'],
            'UiEditable' =>
                Serialize::booleanToString($options['uiEditable']),
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new ServiceInstance(
            $this->version,
            $payload,
            $this->solution['sid']
        );
    }


    /**
     * Access the functions
     */
    protected function getFunctions(): FunctionList
    {
        if (!$this->_functions) {
            $this->_functions = new FunctionList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_functions;
    }

    /**
     * Access the builds
     */
    protected function getBuilds(): BuildList
    {
        if (!$this->_builds) {
            $this->_builds = new BuildList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_builds;
    }

    /**
     * Access the environments
     */
    protected function getEnvironments(): EnvironmentList
    {
        if (!$this->_environments) {
            $this->_environments = new EnvironmentList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_environments;
    }

    /**
     * Access the assets
     */
    protected function getAssets(): AssetList
    {
        if (!$this->_assets) {
            $this->_assets = new AssetList(
                $this->version,
                $this->solution['sid']
            );
        }

        return $this->_assets;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name): ListResource
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext
    {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Serverless.V1.ServiceContext ' . \implode(' ', $context) . ']';
    }
}
