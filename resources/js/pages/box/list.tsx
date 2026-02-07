import { Head } from '@inertiajs/react';
import boxes from '@/routes/boxes'
import { BoxType, BoxStatus, BoxStatusEnum } from '@/types/box';
import AppLayout from '@/layouts/app-layout';
import { DataTable } from '@/components/data-table';
import { BreadcrumbItem, DataTableColumn } from '@/types';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Caixas',
        href: boxes.index().url,
    }
];

const columns: DataTableColumn<BoxType>[] = [
    {
        key: 'name',
        header: 'Nome',
        headerClassName: 'text-center',
    },
    {
        key: 'user.username',
        header: 'Dono'
    },
    {
        key: 'capacity',
        header: 'Capacidade',
    },
    {
        key: 'quantity',
        header: 'Quantidade',
    },
    {
        key: 'status',
        header: 'Estado'
    }
];

interface Props {
    boxes: BoxType[]
}

export default function BoxList({boxes}: Props) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Caixas" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <DataTable
                    data={boxes}
                    columns={columns}
                    keyExtractor={(b) => b.id}
                    tableClassName="bg-white"
                />
           </div>
        </AppLayout>
    )
}
