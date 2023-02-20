import { Component, Inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { CoreService } from 'src/app/core/core.service';
import { Region } from 'src/app/models/region.model';
import { RegionService } from 'src/app/services/region.service';
import { TerritoryService } from 'src/app/services/territory.service';

@Component({
  selector: 'app-territory-form',
  templateUrl: './territory-form.component.html',
  styleUrls: ['./territory-form.component.scss']
})
export class TerritoryFormComponent implements OnInit {

  territoryForm: FormGroup;
  public regions: Region[] = [];

  constructor(
     private _fb: FormBuilder, 
     private _territoryService: TerritoryService, 
     private _regionService: RegionService,
     private _dialogRef: MatDialogRef<TerritoryFormComponent>,
     private _coreService: CoreService,
     @Inject(MAT_DIALOG_DATA) public data: any
   ) {
   this.territoryForm = this._fb.group({
     label: '',
     code: '',
     region: '',
     isActive: true
   })
  }

  ngOnInit(): void {
    this.territoryForm.patchValue(this.data);
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
   if (this.territoryForm.valid) {
    let values = this.territoryForm.value;
      if (this.territoryForm.value.region) {
        values.region = '/regions/' + this.territoryForm.value.region;
      }
     if (this.data) {
       this._territoryService.update(this.data.id, values).subscribe({
         next: (val: any) => {
           this._coreService.openSnackBar('Territory updated successfully!', 'done');
           this._dialogRef.close(true);
         },
         error: (err: any) => {
           console.error(err);
         }
       });
     } else {
       this._territoryService.add(values).subscribe({
         next: (val: any) => {
           this._coreService.openSnackBar('Territory added successfully', 'done');
           this._dialogRef.close(true);
         },
         error: (err: any) => {
           console.error(err);
         }
       });
     }

   }
  }
}
