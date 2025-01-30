"use client"

import { useState } from "react"
import { motion } from "framer-motion"
import Image from "next/image"
import { ChevronDown, MapPin, Phone, Mail } from "lucide-react"

const campusesData = [
  {
    id: 1,
    name: "Main Campus",
    image: "/main-campus.jpg",
    description:
      "Our flagship campus located in the heart of the city, offering a wide range of programs and state-of-the-art facilities.",
    faculties: [
      {
        name: "Faculty of Science and Technology",
        programs: [
          {
            name: "Computer Science",
            description: "Study the theoretical and practical aspects of computation and information processing.",
            department: "Department of Computer Science",
            hod: {
              name: "Dr. Jane Smith",
              email: "jane.smith@university.edu",
              phone: "+265 1234 5678",
            },
          },
          {
            name: "Electrical Engineering",
            description:
              "Learn about the design and application of devices, systems, and processes involving electricity and electronics.",
            department: "Department of Electrical Engineering",
            hod: {
              name: "Prof. John Doe",
              email: "john.doe@university.edu",
              phone: "+265 2345 6789",
            },
          },
        ],
      },
      {
        name: "Faculty of Humanities",
        programs: [
          {
            name: "English Literature",
            description:
              "Explore the rich world of literature in the English language from various periods and cultures.",
            department: "Department of English",
            hod: {
              name: "Dr. Emily Brown",
              email: "emily.brown@university.edu",
              phone: "+265 3456 7890",
            },
          },
        ],
      },
    ],
  },
  {
    id: 2,
    name: "Lakeshore Campus",
    image: "/lakeshore-campus.jpg",
    description: "A beautiful campus situated by the lake, specializing in environmental and marine studies.",
    faculties: [
      {
        name: "Faculty of Environmental Sciences",
        programs: [
          {
            name: "Environmental Management",
            description: "Learn to manage and protect natural resources and ecosystems.",
            department: "Department of Environmental Sciences",
            hod: {
              name: "Dr. Michael Green",
              email: "michael.green@university.edu",
              phone: "+265 4567 8901",
            },
          },
        ],
      },
    ],
  },
]

const CampusesList = () => {
  const [expandedCampus, setExpandedCampus] = useState<number | null>(null)
  const [expandedFaculty, setExpandedFaculty] = useState<string | null>(null)

  return (
    <div className="space-y-8">
      {campusesData.map((campus) => (
        <motion.div
          key={campus.id}
          className="bg-white rounded-xl shadow-lg overflow-hidden"
          initial={{ opacity: 0, y: 50 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
        >
          <div className="md:flex">
            <div className="md:flex-shrink-0">
              <Image
                className="h-48 w-full object-cover md:w-48"
                src={campus.image || "/placeholder.svg"}
                alt={campus.name}
                width={300}
                height={200}
              />
            </div>
            <div className="p-8 w-full">
              <div className="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{campus.name}</div>
              <p className="mt-2 text-gray-500">{campus.description}</p>
              <button
                className="mt-4 flex items-center text-indigo-500 hover:text-indigo-600 transition-colors duration-300"
                onClick={() => setExpandedCampus(expandedCampus === campus.id ? null : campus.id)}
              >
                View Faculties and Programs
                <ChevronDown
                  className={`ml-2 h-5 w-5 transform transition-transform duration-300 ${
                    expandedCampus === campus.id ? "rotate-180" : ""
                  }`}
                />
              </button>
            </div>
          </div>
          {expandedCampus === campus.id && (
            <div className="p-8 bg-gray-50">
              <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {campus.faculties.map((faculty) => (
                  <motion.div
                    key={faculty.name}
                    className="bg-white rounded-lg shadow-md overflow-hidden"
                    initial={{ opacity: 0, scale: 0.9 }}
                    animate={{ opacity: 1, scale: 1 }}
                    transition={{ duration: 0.3 }}
                  >
                    <div className="p-6">
                      <h3 className="text-lg font-semibold mb-2">{faculty.name}</h3>
                      <button
                        className="text-sm text-indigo-500 hover:text-indigo-600 transition-colors duration-300"
                        onClick={() => setExpandedFaculty(expandedFaculty === faculty.name ? null : faculty.name)}
                      >
                        View Programs
                      </button>
                      {expandedFaculty === faculty.name && (
                        <div className="mt-4 space-y-4">
                          {faculty.programs.map((program) => (
                            <motion.div
                              key={program.name}
                              className="bg-gray-50 rounded-lg p-4"
                              initial={{ opacity: 0, y: 20 }}
                              animate={{ opacity: 1, y: 0 }}
                              transition={{ duration: 0.3 }}
                            >
                              <h4 className="font-semibold mb-2">{program.name}</h4>
                              <p className="text-sm text-gray-600 mb-2">{program.description}</p>
                              <div className="text-sm">
                                <p className="font-semibold">{program.department}</p>
                                <p className="font-semibold mt-2">Head of Department:</p>
                                <p>{program.hod.name}</p>
                                <div className="flex items-center mt-1">
                                  <Mail className="h-4 w-4 mr-2 text-gray-400" />
                                  <a href={`mailto:${program.hod.email}`} className="text-indigo-500 hover:underline">
                                    {program.hod.email}
                                  </a>
                                </div>
                                <div className="flex items-center mt-1">
                                  <Phone className="h-4 w-4 mr-2 text-gray-400" />
                                  <a href={`tel:${program.hod.phone}`} className="text-indigo-500 hover:underline">
                                    {program.hod.phone}
                                  </a>
                                </div>
                              </div>
                            </motion.div>
                          ))}
                        </div>
                      )}
                    </div>
                  </motion.div>
                ))}
              </div>
            </div>
          )}
        </motion.div>
      ))}
    </div>
  )
}

export default CampusesList

