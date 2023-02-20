import { Component, Inject } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { CoreService } from 'src/app/core/core.service';
import { Region } from 'src/app/models/region.model';
import { territory } from 'src/app/models/territory.model';
import { AgencyService } from 'src/app/services/agency.service';
import { RegionService } from 'src/app/services/region.service';
import { TerritoryService } from 'src/app/services/territory.service';

@Component({
  selector: 'app-agency-form',
  templateUrl: './agency-form.component.html',
  styleUrls: ['./agency-form.component.scss']
})
export class AgencyFormComponent  {
  agencyForm: FormGroup;
  regions: Region[] = [];
  territories: territory[] = [];

   constructor(
    private _fb: FormBuilder, 
    private _agencyService: AgencyService, 
    private _territoryService: TerritoryService, 
    private _regionService: RegionService,
    private _dialogRef: MatDialogRef<AgencyFormComponent>,
    private _coreService: CoreService,
    @Inject(MAT_DIALOG_DATA) public data: any
    ) {
    this.agencyForm = this._fb.group({
      label: '',
      code: '',
      region: '',
      territory: '',
      isActive: true,
    })
   }

   ngOnInit(): void {
    this.agencyForm.patchValue(this.data);
    this.getRegionList();
  }

  getRegionList() {
    this._regionService.getList().subscribe({
      next: (res) => {
        this.regions = res;
      },
      error: (err) => {
        console.log(err)
      }
    });
  }

   onFormSubmit() {
    if (this.agencyForm.valid) {
     let values = this.agencyForm.value;
      if (this.agencyForm.value.region) {
         values.region = '/regions/' + this.agencyForm.value.region;
      }
      if (this.agencyForm.value.territory) {
        values.territory = '/territories/' + this.agencyForm.value.territory;
      }
      if (this.data) {
        this._agencyService.update(this.data.id, values).subscribe({
          next: (val: any) => {
            this._coreService.openSnackBar('Agency updated successfully!', 'done');
            this._dialogRef.close(true);
          },
          error: (err: any) => {
            console.error(err);
          }
        });
      } else {
        this._agencyService.add(values).subscribe({
          next: (val: any) => {
            this._coreService.openSnackBar('Agency added successfully', 'done');
            this._dialogRef.close(true);
          },
          error: (err: any) => {
            console.error(err);
          }
        });
      }
    }
   }

   regionChange(region: any) {
      this._territoryService.getList({region: region}).subscribe({
        next: (res: any) => {
          this.territories = res;
        },
        error: console.log
      })
   }
}
