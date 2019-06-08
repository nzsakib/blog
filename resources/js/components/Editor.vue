<template>
    <div>
        <div :class="{ splitEditor: splitScreen }">
            <toolbar :data="body"></toolbar>
            <br>
            <textarea name="body" 
                        id="body" 
                        cols="30" 
                        rows="10" 
                        class="form-control"
                        v-model="body"
                        v-if="showEditor || splitScreen"
                        ref="editor"
            ></textarea>
        </div>

        <live-view :data="result" v-if="!showEditor || splitScreen" :split="splitScreen"></live-view>
        
    </div>
</template>

<script>
import marked from 'marked';
import LiveView from './LiveView.vue';
import Toolbar from './Toolbar.vue';
import autosize from 'autosize';

export default {
    components: {
        LiveView,
        Toolbar
    },
    data() {
        return {
            body: '',
            result: '',
            splitScreen: false,
            showEditor: true,
            textarea: null,
        };
    },

    watch: {
        body() {
            this.result = marked(this.body, { sanitize: true });
        }
    },
    methods: {
        bold(data) {
            this.body = data.data;

            this.cursor(data.cursor);
        },
        italic(data) {
            this.body = data.data;

            this.cursor(data.cursor);
        },
        cursor(cursor) {
            setTimeout(() => {
                this.textarea.selectionStart = this.textarea.selectionEnd = cursor;
            }, 10);
            this.textarea.focus();
        },
        toggleEditor() {
            this.showEditor = ! this.showEditor;
        },
        toggleSplit() {
            this.splitScreen = ! this.splitScreen;
        }
    },
    mounted() {
        this.textarea = this.$refs.editor;
        autosize(this.textarea);
        window.event.$on('bold', this.bold);
        window.event.$on('italic', this.italic);
        window.event.$on('preview', this.toggleEditor);
        window.event.$on('split', this.toggleSplit);
    }
}
</script>

<style scoped>
.splitEditor {
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
}
</style>

