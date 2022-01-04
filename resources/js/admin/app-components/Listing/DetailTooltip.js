const DetailTooltip = {
    template:`
	<v-popover class="avatar-tooltip-trigger"
		trigger="click" 
        :placement="placement"
		offset="5"
		container="body"
		:auto-hide="true">
		
		<div v-if="options.showThumbnail">
            <img :src="thumbUrl" class="avatar-photo" :alt="text" v-if="thumbUrl">
            <div class="avatar-initials" v-else>
                {{ abbr }}
            </div>
		</div>
		<div class="avatar-full-name font-weight-bold" v-if="options.showFullNameLabel">
			{{ text }}
		</div>
		
		<template slot="popover">
			<div class="user-avatar" v-if="options.showThumbnail">
				<img :src="thumbUrl" class="avatar-photo" :alt="text" v-if="thumbUrl">
				<div class="avatar-initials" v-else>
					{{ abbr }}
				</div>
			</div>
			<div class="user-info">
				<h6>{{ text }} <small v-if="desc">| <strong style="text-transform: uppercase">{{ desc }}</strong></small></h6>
				<a v-if="url" v-bind:href="url" target="_blank" >Show Detail</a>
				<slot></slot>
			</div>
		</template>
    </v-popover>
`,

    props: {
        data: {
            type: Object,
            required: true
        },
        text: {
            type: String,
            default: function() {
                return '';
            }
        },
        desc: {
            type: String,
            default: function() {
                return '';
            }
        },
        url: {
            type: String,
            default: function() {
                return '';
            }
        },
        thumbUrl: {
            type: String,
            default: function() {
                return '';
            }
        },
        options: {
            type: Object,
            default: function() {
                return {
                    showThumbnail: false,
                    showFullNameLabel: true
                }
            }
        },
        placement: {
            type: String,
            default: function() {
                return 'top';
            }
        },
        edit: {
            type: Boolean,
            default: function () {
                return false;
            }
        },
    },
    computed: {
        abbr() {
            return `${this.text.slice(0, 1)}${this.text.slice(0, 1)}`;
        }
    }
};

export default DetailTooltip;