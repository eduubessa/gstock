export interface BoxType {
    id: number;
    name: string;
    quantity: number;
    capacity: number;
    status: BoxStatus;
}

export type BoxStatus = 'available' | 'in_transit' | 'warehouse' | 'delivered';

export enum BoxStatusEnum {
    AVAILABLE = 'available',
    IN_USE = 'in_use',
    MAINTENANCE = 'maintenance',
    RETIRED = 'retired',
}

export const BOX_STATUS_LABELS: Record<BoxStatusEnum, string> = {
    [BoxStatusEnum.AVAILABLE]: 'Disponível',
    [BoxStatusEnum.IN_USE]: 'Em Uso',
    [BoxStatusEnum.MAINTENANCE]: 'Em Manutenção',
    [BoxStatusEnum.RETIRED]: 'Retirado',
};

export const BOX_STATUS_COLORS: Record<BoxStatusEnum, string> = {
    [BoxStatusEnum.AVAILABLE]: 'green',
    [BoxStatusEnum.IN_USE]: 'blue',
    [BoxStatusEnum.MAINTENANCE]: 'yellow',
    [BoxStatusEnum.RETIRED]: 'gray',
};
