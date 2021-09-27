/**
 * Register globally available components into this file.
 */

import Button from "./components/button.vue";
import CardContent from "./components/card-content.vue";
import Card from "./components/card.vue";
import FormCheckbox from "./components/form/form-checkbox.vue";
import FormEditor from "./components/form/form-editor.vue";
import FormFile from "./components/form/form-file.vue";
import FormGroup from "./components/form/form-group.vue";
import FormInput from "./components/form/form-input.vue";
import FormLabel from "./components/form/form-label.vue";
import FormSelect from "./components/form/form-select.vue";
import FormTextarea from "./components/form/form-textarea.vue";
import Form from "./components/form/form.vue";
import Link from "./components/link.vue";
import SectionGroup from "./components/section-group.vue";
import SectionHeading from "./components/section-heading.vue";
import Section from "./components/section.vue";
import TableBody from "./components/table-body.vue";
import TableData from "./components/table-data.vue";
import TableHead from "./components/table-head.vue";
import TableHeader from "./components/table-header.vue";
import TableRow from "./components/table-row.vue";
import Table from "./components/table.vue";
import Text from "./components/text.vue";
import VerticalMenuItem from "./components/vertical-menu-item.vue";
import VerticalMenu from "./components/vertical-menu.vue";

const components = {
    "v-button": Button,
    "v-card-content": CardContent,
    "v-card": Card,
    "v-form-checkbox": FormCheckbox,
    "v-form-editor": FormEditor,
    "v-form-file": FormFile,
    "v-form-group": FormGroup,
    "v-form-input": FormInput,
    "v-form-label": FormLabel,
    "v-form-select": FormSelect,
    "v-form-textarea": FormTextarea,
    "v-form": Form,
    "v-link": Link,
    "v-section-group": SectionGroup,
    "v-section-heading": SectionHeading,
    "v-section": Section,
    "v-table-body": TableBody,
    "v-table-data": TableData,
    "v-table-head": TableHead,
    "v-table-header": TableHeader,
    "v-table-row": TableRow,
    "v-table": Table,
    "v-text": Text,
    "v-vertical-menu-item": VerticalMenuItem,
    "v-vertical-menu": VerticalMenu,
};

const registerComponents = (app = null) => {
    Object.keys(components).forEach((key) => {
        app.component(key, components[key]);
    });
};

export default registerComponents;