import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ProjectRoutingModule } from './project-routing.module';
import { ProjectsComponent } from './projects/projects.component';
import { ProjectDetailComponent } from './project-detail/project-detail.component';
import { MatDialogModule } from '@angular/material/dialog';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { MatButtonModule } from '@angular/material/button';
import { MatTableModule } from '@angular/material/table';
import { MatPaginatorModule } from '@angular/material/paginator';
import { MatIconModule } from '@angular/material/icon';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import {MatExpansionModule} from '@angular/material/expansion';
import {MatGridListModule} from '@angular/material/grid-list';
import {MatTabsModule} from '@angular/material/tabs';
import {MatListModule} from '@angular/material/list';
import { BorrowerComponent } from './project-detail/borrower/borrower.component';
import { InfoItemComponent } from './project-detail/info-item/info-item.component';
import { WorkflowComponent } from './project-detail/workflow/workflow.component';
import { ProjectShowComponent } from './project-show/project-show.component';
import {MatSlideToggleModule} from '@angular/material/slide-toggle';
import {MatCardModule} from '@angular/material/card';
import {MatStepperModule} from '@angular/material/stepper';
import { StepsComponent } from './project-detail/steps/steps.component';
import { IntegrationStepComponent } from './project-detail/steps/integration-step/integration-step.component';
import { AnalyzeStepComponent } from './project-detail/steps/analyze-step/analyze-step.component';

@NgModule({
  declarations: [
    ProjectsComponent,
    ProjectDetailComponent,
    BorrowerComponent,
    InfoItemComponent,
    WorkflowComponent,
    ProjectShowComponent,
    StepsComponent,
    IntegrationStepComponent,
    AnalyzeStepComponent
  ],
  imports: [
    CommonModule,
    ProjectRoutingModule,
    MatDialogModule,
    FormsModule,
    ReactiveFormsModule,
    MatButtonModule,
    MatTableModule,
    MatPaginatorModule,
    MatIconModule,
    MatFormFieldModule,
    MatInputModule,
    MatExpansionModule,
    MatGridListModule,
    MatTabsModule,
    MatListModule,
    MatSlideToggleModule,
    MatCardModule,
    MatStepperModule
  ]
})
export class ProjectModule { }
