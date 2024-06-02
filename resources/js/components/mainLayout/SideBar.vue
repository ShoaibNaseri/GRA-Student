<template>
    <div id="left-sidebar" class="sidebar">
        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-arrow-left"></i></button>
        <div class="sidebar-scroll">
            <profile :student="student"></profile>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href=""><i class="icon-book-open"></i></a>
                </li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i
                            class="icon-settings"></i></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i
                            class="icon-question"></i></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content padding-0">
                <menu-list></menu-list>
                <!-- Setting Link Above of Side menu -->
                <skin></skin>
                <question></question>
            </div>
        </div>
    </div>
</template>

<script>
import MenuList from '../sideBar/MenuList.vue'
import Profile from '../sideBar/Profile.vue'
import Question from '../sideBar/Question.vue'
import Skin from '../sideBar/Skin.vue'
export default {
    components: { Profile, Skin, MenuList, Question },
    props: {
        student: {

        }
    },

    name: 'SideBar'
}

</script>
