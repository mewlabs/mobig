<?php

namespace InstagramAPI\Devices;

interface DeviceInterface
{
    /**
     * Get the device app version string.
     *
     * @return string
     */
    public function getAppVersion();

    /**
     * Set the device app version string.
     *
     * @param string $appVersion
     *
     * @return void
     */
    public function setAppVersion($appVersion);

    /**
     * Get the device version code.
     *
     * @return string
     */
    public function getVersionCode();

    /**
     * Set the device version code.
     *
     * @param string $versionCode
     *
     * @return void
     */
    public function setVersionCode($versionCode);

    /**
     * Get the device identity string.
     *
     * @return string
     */
    public function getDeviceString();

    /**
     * Get the HTTP user-agent string.
     *
     * @return string
     */
    public function getUserAgent();

    /**
     * Set the HTTP user-agent string.
     *
     * @param string $appVersion
     * @param string $versionCode
     *
     * @return void
     */
    public function setUserAgent($appVersion, $versionCode);

    /**
     * Get the Facebook user-agent string.
     *
     * @param string $appName Application name.
     *
     * @return string
     */
    public function getFbUserAgent(
        $appName);

    /**
     * Get the Android SDK/API version.
     *
     * @return string
     */
    public function getAndroidVersion();

    /**
     * Get the Android release version.
     *
     * @return string
     */
    public function getAndroidRelease();

    /**
     * Get the display DPI (with "dpi" suffix).
     *
     * @return string
     */
    public function getDPI();

    /**
     * Get the display resolution (width x height).
     *
     * @return string
     */
    public function getResolution();

    /**
     * Get the manufacturer.
     *
     * @return string
     */
    public function getManufacturer();

    /**
     * Get the brand (optional).
     *
     * @return string|null
     */
    public function getBrand();

    /**
     * Get the hardware model.
     *
     * @return string
     */
    public function getModel();

    /**
     * Get the hardware device code.
     *
     * @return string
     */
    public function getDevice();

    /**
     * Get the hardware CPU code.
     *
     * @return string
     */
    public function getCPU();
}
