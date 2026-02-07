import { DataTableProps } from '@/types';
import { get } from '@/lib/utils';

export function DataTable<T>({
    data,
    columns,
    keyExtractor,
    tableClassName = '',
    rowClassName,
}: DataTableProps<T>) {
    return (
        <div className="overflow-x-auto rounded-lg border border-gray-200">
            <table
                className={`min-w-full divide-y divide-gray-200 text-sm ${tableClassName}`}
            >
                <thead className="bg-gray-50">
                    <tr>
                        {columns.map((col) => (
                            <th
                                key={String(col.key)}
                                className={`px-4 py-3 text-left text-xs font-semibold tracking-widest text-gray-500 uppercase ${col.headerClassName ?? ''}`}
                            >
                                {col.header}
                            </th>
                        ))}
                    </tr>
                </thead>

                <tbody className="divide-y divide-gray-200 bg-white">
                    {data.length === 0 ? (
                        <tr>
                            <td
                                colSpan={columns.length}
                                className="px-4 py-8 text-center text-gray-500"
                            >
                                Sem registos encontrados.
                            </td>
                        </tr>
                    ) : (
                        data.map((row) => (
                            <tr
                                key={keyExtractor(row)}
                                className={`transition-colors hover:bg-gray-50 ${rowClassName ?? ''}`}
                            >
                                {columns.map((col) => {
                                    const rawValue = get(
                                        row,
                                        String(col.key),
                                        '-',
                                    );

                                    return (
                                        <td
                                            key={String(col.key)}
                                            className={`px-4 py-3 ${col.className ?? ''}`}
                                        >
                                            {col.render
                                                ? col.render(row)
                                                : col.format
                                                  ? col.format(rawValue, row)
                                                  : rawValue}
                                        </td>
                                    );
                                })}
                            </tr>
                        ))
                    )}
                </tbody>
            </table>
        </div>
    );
}
