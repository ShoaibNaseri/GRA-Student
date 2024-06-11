<template>
    <div class="tab-pane active" id="menu">
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu li_animation_delay">
                <span v-for="(menu, index) in menuItems" :key="index">
                    <li v-if="menu.mainTitle" class="text-secondary">
                        <div class="p-2">
                            {{ menu.mainTitle }}</div>
                    </li>
                    <li class="" @click="toggleSubmenu(index)" v-if="!menu.children">
                        <router-link :to="{ name: menu.routeName }"><span class=" text-info"><i :class="menu.icon"></i>
                            </span><span>{{ menu.name }}</span></router-link>
                    </li>
                    <li v-else>
                        <router-link href="" @click="toggleSubmenu(index)" :to="{}" class=" has-arrow"
                            aria-expanded="true"><span class="text-secondary"><i :class="menu.icon"></i></span>
                            <span class="">{{ menu.name }}</span>
                        </router-link>
                        <ul v-if="menu.showSubMenu" aria-expanded="true" class="collapse in">
                            <li class="" v-for="(childItem, childIndex) in menu.children" :key="childIndex">
                                <router-link href="" :to="{ name: childItem.routeName }">
                                    {{ childItem.name }}
                                </router-link>
                            </li>
                        </ul>
                    </li>
                </span>
            </ul>
        </nav>
    </div>

</template>
<script>
export default {
    name: "MenuList",
    data() {
        return {
            isActive: '',
            menuItems: [
                {
                    name: 'Dashboard',
                    routeName: 'Dashboard',
                    icon: 'fa fa-dashboard p-10',
                    mainTitle: 'Dashboadings'

                },
                {
                    name: 'Profile',
                    icon: 'fa fa-user p-10',
                    mainTitle: 'Profilings',
                    showSubMenu: false,
                    children: [
                        {
                            name: 'Profile',
                            routeName: ''
                        },
                        {
                            name: 'Applying Credentials',
                            routeName: 'credential.index'
                        },
                        {
                            name: 'Personel Information',
                            routeName: 'profilings.personel'
                        },
                        {
                            name: 'Educational Background',
                            routeName: 'education.index',
                        },
                        {
                            name: 'Certified Languages',
                            routeName: ''
                        },
                        {

                        },
                        {
                            name: 'Education Details',
                            routeName: ''
                        }
                    ]

                },
                {
                    name: 'Documents',
                    mainTitle: 'Documents Pannel',
                    icon: 'fa fa-user p-10',
                    children: [
                        {
                            name: 'updated',

                        }
                    ]

                }
            ]
        }
    },
    methods: {
        addActiveClass() {
            this.isActive = 'active';
        },

        toggleSubmenu(menuIndex) {
            this.menuItems.forEach((item, index) => {
                if (index !== menuIndex) {
                    item.showSubMenu = false;
                }
            });

            this.menuItems[menuIndex].showSubMenu = !this.menuItems[menuIndex].showSubMenu;
        }

    }
}

</script>
<style></style>
