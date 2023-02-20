import { Region } from "./region.model";

export interface territory {
    id: number;
    label: string;
    code: string;
    isActive: boolean;
    region: Region;
}
