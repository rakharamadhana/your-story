<x-livewire-tables::bs4.table.cell>
    {{ $row->user->student->academic_year }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->user->student->grade }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->user->student->class }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->user->name_en }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->user->student->student_number }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->cases->name_en }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->task->name_en }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->emo_1 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->emo_2 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->nvc_1 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->nvc_2 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->nvc_3 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->nvc_4 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {!! $row->nvc_end ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->created_at }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->updated_at }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.cases.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
