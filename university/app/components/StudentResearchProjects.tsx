"use client"

import { useState } from "react"
import { motion, AnimatePresence } from "framer-motion"
import Image from "next/image"

const researchProjects = [
  {
    id: 1,
    title: "AI-Powered Early Detection of Plant Diseases",
    description:
      "This research project focuses on developing an artificial intelligence system that can detect plant diseases in their early stages. By analyzing images of plant leaves, the AI can identify various diseases with high accuracy, potentially revolutionizing crop management and food security.",
    achievements:
      "The system achieved a 95% accuracy rate in identifying 10 common plant diseases across 5 different crop types. The research was presented at the International Conference on Agricultural Technology and has been submitted for publication in a peer-reviewed journal.",
    studentName: "Emily Chen",
    program: "Computer Science",
    year: "4th Year",
    image: "/emily-chen.jpg",
  },
  {
    id: 2,
    title: "Sustainable Urban Water Management Using IoT",
    description:
      "This project explores the use of Internet of Things (IoT) technology to create a smart water management system for urban areas. The system includes a network of sensors to monitor water quality, usage patterns, and potential leaks in real-time.",
    achievements:
      "The prototype system was successfully implemented in a small neighborhood, resulting in a 30% reduction in water waste and improved response times to water quality issues. The project won first place in the university's annual sustainability competition.",
    studentName: "Michael Okonkwo",
    program: "Environmental Engineering",
    year: "3rd Year",
    image: "/michael-okonkwo.jpg",
  },
  {
    id: 3,
    title: "The Impact of Social Media on Mental Health in Adolescents",
    description:
      "This research study investigates the relationship between social media use and mental health outcomes in adolescents aged 13-18. Through surveys, interviews, and data analysis, the study aims to identify potential risk factors and protective measures.",
    achievements:
      "The study, which included over 1,000 participants, found significant correlations between certain types of social media use and increased anxiety and depression. The findings have been presented at a national psychology conference and are being used to develop a school-based intervention program.",
    studentName: "Sophia Rodriguez",
    program: "Psychology",
    year: "Graduate Student",
    image: "/sophia-rodriguez.jpg",
  },
]

const StudentResearchProjects = () => {
  const [expandedProject, setExpandedProject] = useState<number | null>(null)

  return (
    <div className="space-y-8">
      {researchProjects.map((project) => (
        <motion.div
          key={project.id}
          className="bg-white rounded-xl shadow-lg overflow-hidden"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
        >
          <div className="md:flex">
            <div className="md:flex-shrink-0">
              <Image
                className="h-48 w-full object-cover md:w-48"
                src={project.image || "/placeholder.svg"}
                alt={project.studentName}
                width={200}
                height={200}
              />
            </div>
            <div className="p-8 w-full">
              <div className="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{project.program}</div>
              <h2 className="block mt-1 text-lg leading-tight font-medium text-black">{project.title}</h2>
              <p className="mt-2 text-gray-500">
                {project.studentName} - {project.year}
              </p>
              <p className="mt-2 text-gray-600">{project.description.substring(0, 150)}...</p>
              <button
                className="mt-4 text-indigo-600 hover:text-indigo-800 transition-colors duration-300"
                onClick={() => setExpandedProject(expandedProject === project.id ? null : project.id)}
              >
                {expandedProject === project.id ? "Show Less" : "Read More"}
              </button>
            </div>
          </div>
          <AnimatePresence>
            {expandedProject === project.id && (
              <motion.div
                initial={{ opacity: 0, height: 0 }}
                animate={{ opacity: 1, height: "auto" }}
                exit={{ opacity: 0, height: 0 }}
                transition={{ duration: 0.3 }}
                className="px-8 pb-8"
              >
                <h3 className="font-semibold text-lg mb-2">Full Description</h3>
                <p className="text-gray-600 mb-4">{project.description}</p>
                <h3 className="font-semibold text-lg mb-2">Achievements</h3>
                <p className="text-gray-600">{project.achievements}</p>
              </motion.div>
            )}
          </AnimatePresence>
        </motion.div>
      ))}
    </div>
  )
}

export default StudentResearchProjects

