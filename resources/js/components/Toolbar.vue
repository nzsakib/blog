<template>
    <div>
        <button class="btn btn-outline-secondary btn-sm" @click.prevent="bold">Bold</button>
        <button class="btn btn-outline-secondary btn-sm" @click.prevent="italic">italic</button>
        <button class="btn btn-outline-secondary btn-sm" @click.prevent="italic">Image</button>
        <button class="btn btn-outline-secondary btn-sm" @click.prevent="italic">Link</button>
        <button class="btn btn-outline-secondary btn-sm" @click.prevent="italic">Quote</button>
        <button class="btn btn-outline-secondary btn-sm" @click.prevent="showPreview">Preview</button>
        <button class="btn btn-outline-secondary btn-sm" @click.prevent="showSplit">Split Screen</button>
    </div>
</template>

<script>
export default {
    props: ['data'],
    data() {
        return {
            textarea: null,
            startPos: 0,
            endPos: 0,
            cursorPos: 0,
            value: '',
            beforeText: '',
            afterText: '',
            selectedText: '',
            result: '',
        };
    },
    methods: {
        bold() {
            this.setParameters();
            self = this;
            let result = '';
            if (this.beforeText.slice(-2) === '**' && this.afterText.slice(0, 2) === '**') {
                this.beforeText = this.beforeText.slice(0, -2) 
                this.afterText = this.afterText.slice(2)
                result = this.beforeText + this.selectedText + this.afterText;
            } 
            else {
                result = this.beforeText + '**' + this.selectedText + '**' + this.afterText;
            } 
            window.event.$emit('bold', {
                data: result,
                cursor: self.cursorPos += self.selectedText.length + 2
            });
        },
        italic() {
            this.setParameters();
            self = this;
            let result = '';
            if (this.beforeText.slice(-1) === '*' && this.afterText.slice(0, 1) === '*') {
                this.beforeText = this.beforeText.slice(0, -1) 
                this.afterText = this.afterText.slice(1)
                result = this.beforeText + this.selectedText + this.afterText;
            } 
            else {
                result = this.beforeText + '*' + this.selectedText + '*' + this.afterText;
            } 
            event.$emit('italic', {
                data: result,
                cursor: self.cursorPos += self.selectedText.length + 1
            });
        },
        setParameters() {
            this.startPos = this.textarea.selectionStart;
            this.endPos = this.textarea.selectionEnd;
            this.cursorPos = this.startPos;
            this.value = this.textarea.value;
            this.beforeText = this.value.substring(0, this.startPos);
            this.afterText = this.value.substring(this.endPos, this.value.length);
            this.selectedText = this.value.substring(this.startPos, this.endPos);
        },
        showPreview() {
            window.event.$emit('preview');
        },
        showSplit() {
            window.event.$emit('split');
        }
    },
    mounted() {
        this.textarea = this.$parent.$refs.editor;
    }
}
</script>

