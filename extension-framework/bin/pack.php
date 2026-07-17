#!/usr/bin/env php
<?php

/*
 * Copyright (C) Amaiza LLC. - All Rights Reserved
 *
 * This source code is proprietary and confidential and protected under
 * international copyright law. All rights reserved and protected by
 * the copyright holders. This file is only available to authorized individuals
 * with the permission of the copyright holders. Unauthorized copying of this file,
 * via any medium is strictly prohibited. If you encounter this file and do not have
 * permission, please contact the copyright holders and delete this file.
 *
 */

declare(strict_types=1);

const PACKAGE_ID = 'SugarDevelopersGuideExtensionFrameworkExamples';
const PACKAGE_LABEL = 'Sugar Developers Guide | Extension Framework Examples';

$version = $argv[1] ?? null;

if ($version === null || !preg_match('/^\d+\.\d+\.\d+$/', $version)) {
    exit("Usage: php extension-framework/bin/pack.php <major.minor.patch>\n");
}

$projectRoot = dirname(__DIR__, 2);
$exampleRoot = dirname(__DIR__);
$buildDirectory = $exampleRoot . '/builds';
$archivePath = sprintf('%s/%s_%s.zip', $buildDirectory, strtolower(PACKAGE_ID), $version);
$contactPriorityRoot = $exampleRoot . '/package/contact-priority';

if (file_exists($archivePath)) {
    exit("Build already exists: {$archivePath}\n");
}

if (!is_dir($buildDirectory) && !mkdir($buildDirectory, 0755, true) && !is_dir($buildDirectory)) {
    exit("Unable to create build directory: {$buildDirectory}\n");
}

$manifest = [];
$installdefs = [];
require $contactPriorityRoot . '/manifest.php';

$manifest = array_replace($manifest, [
    'id' => PACKAGE_ID,
    'name' => PACKAGE_LABEL,
    'description' => 'Installable examples for Sugar Extension Framework customizations.',
    'version' => $version,
    'author' => 'Sugar Developers Guide',
    'is_uninstallable' => true,
    'built_in_version' => '26.1.0',
    'published_date' => date('Y-m-d H:i:s'),
    'type' => 'module',
    'remove_tables' => false,
    'acceptable_sugar_versions' => [
        'regex_matches' => ['^26\\.(.*?)\\.(.*?)'],
    ],
    'acceptable_sugar_flavors' => ['PRO', 'ENT', 'ULT'],
]);

$installdefs['id'] = PACKAGE_ID;
$installdefs['copy'] = [];

$zip = new ZipArchive();

if ($zip->open($archivePath, ZipArchive::CREATE | ZipArchive::EXCL) !== true) {
    exit("Unable to create archive: {$archivePath}\n");
}

try {
    addDirectory($zip, $contactPriorityRoot . '/Extension', 'Extension');
    addCustomSources($zip, $exampleRoot . '/custom', $installdefs);

    if (!$zip->addFile($projectRoot . '/LICENSE', 'LICENSE.txt')) {
        throw new RuntimeException('Unable to add LICENSE.txt to the archive.');
    }

    $manifestContent = "<?php\n"
        . '$manifest = ' . var_export($manifest, true) . ";\n"
        . '$installdefs = ' . var_export($installdefs, true) . ";\n";

    if (!$zip->addFromString('manifest.php', $manifestContent)) {
        throw new RuntimeException('Unable to add manifest.php to the archive.');
    }
} finally {
    $zip->close();
}

echo "Created {$archivePath}\n";

/**
 * Add all deployable package files beneath a directory.
 */
function addDirectory(ZipArchive $zip, string $sourceDirectory, string $archiveDirectory): void
{
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($sourceDirectory, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($files as $file) {
        if (!$file->isFile()) {
            continue;
        }

        $relativePath = substr($file->getPathname(), strlen($sourceDirectory) + 1);

        if (!isDeployableFile($relativePath)) {
            continue;
        }

        $archivePath = $archiveDirectory . '/' . str_replace(DIRECTORY_SEPARATOR, '/', $relativePath);

        if (!$zip->addFile($file->getPathname(), $archivePath)) {
            throw new RuntimeException("Unable to add {$archivePath} to the archive.");
        }
    }
}

/**
 * Add custom sources and generate their installer definitions.
 *
 * @param array<string, mixed> $installdefs
 */
function addCustomSources(ZipArchive $zip, string $customDirectory, array &$installdefs): void
{
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($customDirectory, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($files as $file) {
        if (!$file->isFile()) {
            continue;
        }

        $relativePath = substr($file->getPathname(), strlen($customDirectory) + 1);

        if (!isDeployableFile($relativePath)) {
            continue;
        }

        $archivePath = 'custom/' . str_replace(DIRECTORY_SEPARATOR, '/', $relativePath);

        if (!$zip->addFile($file->getPathname(), $archivePath)) {
            throw new RuntimeException("Unable to add {$archivePath} to the archive.");
        }

        $languageDefinition = getLanguageDefinition($archivePath);

        if ($languageDefinition !== null) {
            $installdefs['language'][] = $languageDefinition;
            continue;
        }

        $installdefs['copy'][] = [
            'from' => '<basepath>/' . $archivePath,
            'to' => $archivePath,
        ];
    }
}

/**
 * @return array{from: string, to_module: string, language: string}|null
 */
function getLanguageDefinition(string $archivePath): ?array
{
    if (!preg_match(
        '#^custom/Extension/(?:modules/([^/]+)/|application/)Ext/Language/([a-z]{2}_[A-Z]{2})[^/]*\.php$#',
        $archivePath,
        $matches
    )) {
        return null;
    }

    $module = $matches[1] !== '' ? $matches[1] : 'application';

    return [
        'from' => '<basepath>/' . $archivePath,
        'to_module' => $module,
        'language' => $matches[2],
    ];
}

function isDeployableFile(string $path): bool
{
    $excludedNames = ['.DS_Store', '.gitkeep', 'orderMapping.php'];

    return !in_array(basename($path), $excludedNames, true);
}
