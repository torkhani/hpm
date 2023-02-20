import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { ProjectService } from 'src/app/services/project.service';

@Component({
  selector: 'app-project-detail',
  templateUrl: './project-detail.component.html',
  styleUrls: ['./project-detail.component.scss']
})
export class ProjectDetailComponent implements OnInit {
  activeLink = 'true';
  project!: any;

  constructor(private _projectService: ProjectService, private route: ActivatedRoute) { }

  ngOnInit(): void {
    const projectId = this.route.snapshot.paramMap.get('id');

    this._projectService.get(projectId).subscribe({
      next: (res) => {
        this.project = res;
      }
    })
  }

}
