import React from 'react';
export interface DataTableColumn<T> {
    key: string
    header: string
    className?: string
    headerClassName?: string
    format?: (value: unknown, row: T) => React.ReactNode
    render?: (row: T) => React.ReactNode
}

export interface DataTableProps<T> {
    data: T[],
    columns: DataTableColumn<T>[],
    keyExtractor: (row: T) => string | number
    tableClassName?: string,
    rowClassName?: string
}
