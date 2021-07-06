<?php

namespace CrowdinApiClient\Api;

use CrowdinApiClient\Model\SourceString;
use CrowdinApiClient\ModelCollection;

/**
 * Class SourceStringApi
 * @package Crowdin\Api
 */
class SourceStringApi extends AbstractApi
{
    /**
     * List Strings
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.strings.getMany API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.strings.getMany API Documentation Enterprise
     *
     * @param int $projectId
     * @param array $params
     * @return ModelCollection
     */
    public function list(int $projectId, array $params = []): ModelCollection
    {
        $path = sprintf('projects/%d/strings', $projectId);
        return $this->_list($path, SourceString::class, $params);
    }

    /**
     * Get String
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.strings.get API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.strings.get API Documentation Enterprise
     *
     * @param int $projectId
     * @param int $stringId
     * @return SourceString
     */
    public function get(int $projectId, int $stringId): ?SourceString
    {
        $path = sprintf('projects/%d/strings/%d', $projectId, $stringId);
        return $this->_get($path, SourceString::class);
    }

    /**
     * Add String
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.strings.post API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.strings.post API Documentation Enterprise
     *
     * @param int $projectId
     * @param array $data
     * @internal string $data[identifier] Required for strings-based projects or file-based projects if scheme of CSV file includes identifier column
     * @internal string $data[text] required
     * @internal integer $data[fileId]
     * @internal string $data[context]
     * @internal bool $data[isHidden]
     * @internal integer $data[maxLength]
     * @return SourceString|null
     */
    public function create(int $projectId, array $data): ?SourceString
    {
        $path = sprintf('projects/%d/strings', $projectId);
        return $this->_create($path, SourceString::class, $data);
    }

    /**
     * Edit String
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.strings.patch API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.strings.patch API Documentation Enterprise
     *
     * @param SourceString $sourceString
     * @return SourceString|null
     */
    public function update(SourceString $sourceString): ?SourceString
    {
        $path = sprintf('projects/%d/strings/%d', $sourceString->getProjectId(), $sourceString->getId());
        return $this->_update($path, $sourceString);
    }

    /**
     * Delete String
     * @link https://support.crowdin.com/api/v2/#operation/api.projects.strings.delete API Documentation
     * @link https://support.crowdin.com/enterprise/api/#operation/api.projects.strings.delete API Documentation Enterprise
     *
     * @param int $projectId
     * @param int $stringId
     * @return mixed
     */
    public function delete(int $projectId, int $stringId)
    {
        $path = sprintf('projects/%d/strings/%d', $projectId, $stringId);
        return $this->_delete($path);
    }
}
