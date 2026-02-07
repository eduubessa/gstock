import { useMemo } from 'react';
import { BOX_STATUS_COLORS, BOX_STATUS_LABELS, BoxStatusEnum } from '@/types/box';

export function useBoxStatusLabel(status: BoxStatusEnum) {
    return useMemo(
        () => ({
            label: BOX_STATUS_LABELS[status] ?? status,
            color: BOX_STATUS_COLORS[status] ?? 'gray',
        }),
        [status],
    );
}

export function useEnumLabel<T extends string>(
    value: T,
    labels: Record<T, string>,
    colors?: Record<T, string>,
) {
    return useMemo(
        () => ({
            label: labels[value] ?? value,
            color: colors?.[value] ?? 'gray',
        }),
        [value, labels, colors],
    );
}
