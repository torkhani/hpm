import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ProjectDetailComponent } from './project-detail/project-detail.component';
import { StepsComponent } from './project-detail/steps/steps.component';
import { WorkflowComponent } from './project-detail/workflow/workflow.component';
import { ProjectShowComponent } from './project-show/project-show.component';
import { ProjectsComponent } from './projects/projects.component';

const routes: Routes = [
  {
    path: '',
    component: ProjectsComponent,
    data: {
      breadcrumb: 'Projets'
    }
  },
  {
    path: ':id',
    component: ProjectShowComponent,
    children: [
      {
        path: '',
        component: ProjectDetailComponent,
        data: {
          breadcrumb: 'Projets'
        }
      },
      {
        path: 'workflow',
        component: WorkflowComponent,
        data: {
          breadcrumb: 'Projets'
        }
      },
      {
        path: 'suivi',
        component: StepsComponent,
        data: {
          breadcrumb: 'Projets'
        }
      }
    ],
    data: {
      breadcrumb: 'Projets'
    }
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProjectRoutingModule { }
