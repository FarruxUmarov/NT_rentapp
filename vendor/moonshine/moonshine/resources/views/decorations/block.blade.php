<x-moonshine::box
    :attributes="$attributes"
    :title="$element->label()"
    :icon="$element->iconValue()"
>
    <x-moonshine::fields-group
        :components="$element->getFields()"
    />
</x-moonshine::box>
