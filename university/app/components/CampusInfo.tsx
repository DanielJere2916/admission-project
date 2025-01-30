"use client"

import { useState, useEffect } from "react"
import Link from "next/link"

const announcements = [
  "2024 Intake Open! 15 Days Remaining",
  "Final Exam Schedule Released",
  "Scholarship Application Deadline Extended",
  "New Computer Science Lab Inauguration Next Week",
]

const CampusInfo = () => {
  const [currentAnnouncement, setCurrentAnnouncement] = useState(0)

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentAnnouncement((prev) => (prev + 1) % announcements.length)
    }, 5000)
    return () => clearInterval(timer)
  }, [])

  return (
    <section className="py-16 bg-gray-100">
      <div className="container mx-auto px-4">
        <div className="flex flex-col md:flex-row gap-8">
          <div className="md:w-1/2">
            <h2 className="text-2xl font-bold mb-4">Campus Information</h2>
            <p className="text-gray-600 mb-4">
              Our university is committed to merit-based admissions and maintaining the highest standards of academic
              integrity. We warn against any fraudulent activities related to admissions or academic performance.
            </p>
            <Link href="/contact" className="text-blue-600 hover:underline">
              Contact us for more information
            </Link>
          </div>
          <div className="md:w-1/2">
            <h2 className="text-2xl font-bold mb-4">Announcements</h2>
            <div className="bg-white p-4 rounded-lg shadow-md h-32 overflow-hidden">
              <div className="animate-marquee">
                {announcements.map((announcement, index) => (
                  <p key={index} className="text-lg mb-2">
                    {announcement}
                  </p>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}

export default CampusInfo

