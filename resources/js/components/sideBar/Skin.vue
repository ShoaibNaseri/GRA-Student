<template>
    <div class="tab-pane" id="setting">
        <h6>Choose Skin</h6>
        <ul class="choose-skin list-unstyled">
            <li data-theme="purple">
                <div class="purple"></div>
            </li>
            <li data-theme="blue">
                <div class="blue"></div>
            </li>
            <li data-theme="cyan" class="active">
                <div class="cyan"></div>
            </li>
            <li data-theme="green">
                <div class="green"></div>
            </li>
            <li data-theme="orange">
                <div class="orange"></div>
            </li>
            <li data-theme="blush">
                <div class="blush"></div>
            </li>
            <li data-theme="red">
                <div class="red"></div>
            </li>
        </ul>

        <ul class="list-unstyled font_setting mt-3">
            <li>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="font" value="font-nunito" checked="">
                    <span class="custom-control-label">Nunito Google Font</span>
                </label>
            </li>
            <li>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="font" value="font-ubuntu">
                    <span class="custom-control-label">Ubuntu Font</span>
                </label>
            </li>
            <li>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="font" value="font-raleway">
                    <span class="custom-control-label">Raleway Google Font</span>
                </label>
            </li>
            <li>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="font" value="font-IBMplex">
                    <span class="custom-control-label">IBM Plex Google Font</span>
                </label>
            </li>
        </ul>

        <ul class="list-unstyled mt-3">
            <li class="d-flex align-items-center mb-2">
                <label class="toggle-switch theme-switch">
                    <input type="checkbox">
                    <span class="toggle-switch-slider"></span>
                </label>
                <span class="ml-3">Enable Dark Mode!</span>
            </li>
            <li class="d-flex align-items-center mb-2">
                <label class="toggle-switch theme-rtl">
                    <input type="checkbox">
                    <span class="toggle-switch-slider"></span>
                </label>
                <span class="ml-3">Enable RTL Mode!</span>
            </li>
            <li class="d-flex align-items-center mb-2">
                <label class="toggle-switch theme-high-contrast">
                    <input type="checkbox">
                    <span class="toggle-switch-slider"></span>
                </label>
                <span class="ml-3">Enable High Contrast Mode!</span>
            </li>
        </ul>

        <hr>
        <h6>General Settings</h6>
        <ul class="setting-list list-unstyled">
            <li>
                <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox" checked>
                    <span>Allowed Notifications</span>
                </label>
            </li>
            <li>
                <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox">
                    <span>Offline</span>
                </label>
            </li>
            <li>
                <label class="fancy-checkbox">
                    <input type="checkbox" name="checkbox">
                    <span>Location Permission</span>
                </label>
            </li>
        </ul>

        <a href="https://themeforest.net/item/iconic-boostrap-admin-dashboard-html-template/33511081" target="_blank"
            class="btn btn-block btn-primary">Buy this item</a>
        <a href="https://themeforest.net/user/wrraptheme/portfolio" target="_blank"
            class="btn btn-block btn-secondary">View portfolio</a>
    </div>
</template>
<script>
export default {
    name: "skin"
}
</script>
