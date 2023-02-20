import { Component, Inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { CoreService } from 'src/app/core/core.service';
import { RegionService } from 'src/app/services/region.service';

@Component({
  selector: 'app-region-form',
  templateUrl: './region-form.component.html',
  styleUrls: ['./region-form.component.scss']
})
export class RegionFormComponent implements OnInit {
  regionForm: FormGroup;

   constructor(
      private _fb: FormBuilder, 
      private _regionService: RegionService, 
      private _dialogRef: MatDialogRef<RegionFormComponent>,
      private _coreService: CoreService,
      @Inject(MAT_DIALOG_DATA) public data: any
    ) {
    this.regionForm = this._fb.group({
      label: '',
      code: '',
      isActive: true
    })
   }

   ngOnInit(): void {
     this.regionForm.patchValue(this.data)
   }

   onFormSubmit() {
    if (this.regionForm.valid) {
      if (this.data) {
        this._regionService.update(this.data.id, this.regionForm.value).subscribe({
          next: (val: any) => {
            this._coreService.openSnackBar('Region updated successfully!', 'done')

            this._dialogRef.close(true);
          },
          error: (err: any) => {
            console.error(err);
          }
        });
      } else {
        this._regionService.add(this.regionForm.value).subscribe({
          next: (val: any) => {
            this._coreService.openSnackBar('region added successfully', 'done')

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
